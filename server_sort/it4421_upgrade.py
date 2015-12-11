from xml.dom.minidom import parse, parseString
import xml.dom.minidom
from operator import attrgetter

import MySQLdb as mysql
import config as cf

db = mysql.connect(cf.config[0], cf.config[1], cf.config[2], cf.config[3])
cursor = db.cursor()

class SortController(object):

    """docstring for SortController"""

    def __init__(self):
        super(SortController, self).__init__()

    def process(self, info):

        self.majors = {}
        # B1: tao danh sach major
        for major in info.list_majors:
            self.majors[str(major)] = []

        # cursor.execute("DROP TABLE IF EXISTS data")
        # sql = """CREATE TABLE data (
        #              id INT NOT NULL AUTO_INCREMENT,
        #              idf_number  CHAR(20) NOT NULL,
        #              math FLOAT,
        #              physical FLOAT,  
        #              chemistry FLOAT,
        #              total FLOAT, 
        #              number_order FLOAT, 
        #              major CHAR(20), 
        #              PRIMARY KEY (id) )"""
        # cursor.execute(sql)

        # B2: gan ticket co tung nganh
        for ticket in info.list_tickets:
            # sql2 = "INSERT INTO data(idf_number, \
            #                math, physical, chemistry, total, number_order, major) \
            #                VALUES ('%s', '%f', '%f', '%f', '%f', '%d', '%s')" % \
            #                (ticket.idf_number, ticket.math, ticket.physical, ticket.chemistry, ticket.total, ticket.order, ticket.major)
            # cursor.execute(sql2)
            self.majors[ticket.major].append(ticket)

        # db.commit()
        # db.close()

        # B3: sort tung chuyen nganh
        for major_name in info.list_majors:
            self.majors[major_name] = sorted(
                self.majors[major_name], key=attrgetter('total', 'math', 'physical', 'chemistry'), reverse=True)

        # B4: xu ly, chon loc sinh vien
        key_order = 1
        while False:
            key_add = True
            key_break = True
            for major_name in info.list_majors:
                if len(self.majors[major_name]) <= int(info.target[major_name]):
                    continue

                ticket_deletes = []
                for i in range(int(info.target[major_name])):
                    ticket = self.majors[major_name][i]
                    # if ticket.key: ~~~~
                    #    continue

                    if (int(ticket.order) <= key_order):
                        # self.majors[major_name][i].key = True ~~~~
                        for major_name2 in info.list_majors:
                            if major_name2 == ticket.major:
                                continue
                            else:
                                for j in range(len(self.majors[major_name2])):
                                    ticket2 = self.majors[major_name2][j]
                                    if ticket2.idf_number == ticket.idf_number:
                                        # neu nguyen vong ticket uu tien hon
                                        # ticket2
                                        if ticket.order < ticket2.order:
                                            del self.majors[major_name2][j]
                                        # neu gnuyen vong ticket2 uu tien hon,
                                        # va ticket 2 thuoc chi tieu
                                        elif(j < info.target[major_name]):
                                            # sau  khi xoa, kich thuoc cua
                                            # self.majors[major_name] bi giam?? lam
                                            # gi de fix loi nay
                                            ticket_deletes.append(i)
                                        key_break = False
                                        break
                        key_add = False
                for i in ticket_deletes:
                    del self.majors[major_name][i]

            if key_add:
                key_order = key_order+1
                if key_order > 4:
                    break
            elif key_break:
                break
        # for major_name in info.list_majors:
        #     if len(self.majors[major_name]) == 0:
        #         print major_name + " None "
        #         continue
        #     if len(self.majors[major_name]) <= int(info.target[major_name]):
        #         print self.majors[major_name][len(self.majors[major_name])-1].total
        #     else:
        #         print self.majors[major_name][info.target[major_name]-1].total


class Info(object):

    """docstring for Info"""

    def __init__(self):
        super(Info, self).__init__()
        self.list_majors = []
        self.list_tickets = []
        self.target = {'DHYD720101': 531,
                       'DHYD720103': 180,
                       'DHYD720201': 80,
                       'DHYD720301': 50,
                       'DHYD720330': 60,
                       'DHYD720332': 100,
                       'DHYD720401': 152,
                       'DHYD720501': 150,
                       'DHYD720601': 93,
                       'DHYD720330LT': 15}

    def get_data_file(self, file_name=''):
        f = open("y-duoc-h.xml")
        DOMTree = parse(f)

        root = DOMTree.documentElement

        rows = root.getElementsByTagName('Row')
        for row in rows:
            cells = row.getElementsByTagName('Cell')
            ticket = Ticket()

            ticket.set_idf_number(
                cells[2].getElementsByTagName('Data')[0].childNodes[0].data)

            math = cells[5].getElementsByTagName('Data')[0].childNodes[0].data
            physical = cells[7].getElementsByTagName(
                'Data')[0].childNodes[0].data
            chemistry = cells[9].getElementsByTagName(
                'Data')[0].childNodes[0].data
            total = cells[11].getElementsByTagName(
                'Data')[0].childNodes[0].data
            ticket.set_score(math, physical, chemistry, total)

            ticket.set_order(
                cells[12].getElementsByTagName('Data')[0].childNodes[0].data)

            ticket.set_major(
                cells[13].getElementsByTagName('Data')[0].childNodes[0].data)

            self.list_tickets.append(ticket)
            if self.check_not_exist(ticket.major):
                self.list_majors.append(ticket.major)

    def check_not_exist(self, major):
        for tmp in self.list_majors:
            if major == tmp:
                return False
        return True


class Ticket(object):

    """docstring for Ticket :

    moi nguyen vong cua thi sinh se co SBD, diem, nguyen vong thu n va ma nganh
    """

    def __init__(self):
        super(Ticket, self).__init__()
        # self.key = False ~~~~

    def set_idf_number(self, idf_number):
        self.idf_number = idf_number

    def set_score(self, math, physical, chemistry, total):
        self.math = float(math)
        self.physical = float(physical)
        self.chemistry = float(chemistry)
        self.total = float(total)

    def set_order(self, order):
        self.order = int(order)

    def set_major(self, major):
        self.major = major

if __name__ == '__main__':
    sort_object = SortController()
    info = Info()
    info.get_data_file()
    sort_object.process(info)

