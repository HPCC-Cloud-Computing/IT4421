from xml.dom.minidom import parse, parseString
import xml.dom.minidom


class SortController(object):

    """docstring for SortController"""

    def __init__(self):
        super(SortController, self).__init__()

    def process(self):
        info = Info()
        info.get_data()

        majors = {}
        # B1: tao danh sach major
        for major in info.list_majors:
            majors[str(major)] = []

        # B2: gan ticket co tung nganh
        for ticket in info.list_tickets:
            majors[ticket.major].append(ticket)

        # B3: sort tung chuyen nganh
        for major_name in info.list_majors:
            majors[major_name] = sorted(
                majors[major_name], key=lambda ticket: ticket.score, reverse=True)

        # for major_name in info.list_majors:
        #     print major_name
        #     for i in range(len(majors[major_name])):
        #         print "index : ", i
        #         ticket = majors[major_name][i]
        #         print ticket.order

        # B4: xu ly, chon loc sinh vien
        key_order = 1
        while True:
            key_add = True
            key_break = True
            for major_name in info.list_majors:
                if len(majors[major_name]) <= int(info.target[major_name]):
                    continue

                for i in range(int(info.target[major_name])):
                    ticket = majors[major_name][i]
                    if ticket.key:
                        # print "ticket.key ",i
                        continue

                    if (int(ticket.order) <= key_order):
                        majors[major_name][i].key = True
                        for major_name2 in info.list_majors:
                            if major_name2 == ticket.major:
                                continue
                            else:
                                for j in range(len(majors[major_name2])):
                                    if majors[major_name2][j].idf_number == ticket.idf_number:
                                        del majors[major_name2][j]
                                        key_break = False
                                        break
                        key_add = False

            # for major_name in info.list_majors:
            #     print len(majors[major_name])
            # print ""
            if key_add:
                key_order = key_order+1
                if key_order > 4 :
                    break
            elif key_break:
                break 
        for major_name in info.list_majors:
            if len(majors[major_name]) == 0:
                print major_name+ " None "
                continue
            if len(majors[major_name]) <= int(info.target[major_name]):
                print major_name+ " "+ majors[major_name][len(majors[major_name])-1].score
            else:
                print major_name+ " "+ majors[major_name][info.target[major_name]-1].score

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
                       'DHYD720401': 140,
                       'DHYD720501': 150,
                       'DHYD720601': 100,
                       'DHYD720330LT': 15}

    def get_data(self, file_name=''):
        f = open("y-duoc-h.xml")
        DOMTree = parse(f)

        root = DOMTree.documentElement

        rows = root.getElementsByTagName('Row')
        for row in rows:
            cells = row.getElementsByTagName('Cell')
            i = 0
            ticket = Ticket()
            for cell in cells:
                if (i == 2):
                    data = cell.getElementsByTagName('Data')
                    ticket.set_number(data[0].childNodes[0].data)
                if (i == 11):
                    data = cell.getElementsByTagName('Data')
                    ticket.set_score(data[0].childNodes[0].data)
                if (i == 12):
                    data = cell.getElementsByTagName('Data')
                    ticket.set_order(data[0].childNodes[0].data)
                if (i == 13):
                    data = cell.getElementsByTagName('Data')
                    ticket.set_major(data[0].childNodes[0].data)
                i = i + 1

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
        self.key = False

    def set_number(self, idf_number):
        self.idf_number = idf_number

    def set_score(self, score):
        self.score = score

    def set_order(self, order):
        self.order = order

    def set_major(self, major):
        self.major = major

if __name__ == '__main__':
    sort_object = SortController()
    sort_object.process()

        