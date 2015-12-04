import tornado.ioloop
import tornado.web

import MySQLdb as mysql
from it4421_upgrade import SortController, Info, Ticket
import config as cf


class MainHandler(tornado.web.RequestHandler):

    def get(self):
        db = mysql.connect(
            cf.config[0], cf.config[1], cf.config[2], cf.config[3])
        cursor = db.cursor()

        # init query
        cursor.execute("DROP TABLE IF EXISTS "+cf.config[5])
        sql = "CREATE TABLE " + cf.config[5] + " (id int NOT NULL AUTO_INCREMENT, idf_number  CHAR(20) NOT NULL, number_order INT, major CHAR(20), PRIMARY KEY (id) )"
        # excute query
        cursor.execute(sql)

        sort_object = SortController()

        try:
            info = Info()
            sql2 = "SELECT * from "+cf.config[4]
            cursor.execute(sql2)
            results = cursor.fetchall()
            for row in results:
                # print row
                ticket = Ticket()
                ticket.set_idf_number(row[1])
                ticket.set_score(row[2], row[3], row[4], row[5])
                ticket.set_order(row[6])
                ticket.set_major(row[7])
                info.list_tickets.append(ticket)
                if info.check_not_exist(ticket.major):
                    info.list_majors.append(ticket.major)

            sort_object.process(info)  # tuyen sinh o day.

            for major_name in info.list_majors:
                if len(sort_object.majors[major_name]) == 0:
                    continue
                if len(sort_object.majors[major_name]) <= int(info.target[major_name]):
                    for i in range(len(sort_object.majors[major_name])):
                        ticket = sort_object.majors[major_name][i]
                        sql2 = "INSERT INTO "+cf.config[5]+" (idf_number, number_order, major) \
                                   VALUES ('%s', '%d', '%s')" % \
                            (ticket.idf_number, ticket.order, ticket.major)
                        cursor.execute(sql2)
                else:
                    for i in range(info.target[major_name]):
                        ticket = sort_object.majors[major_name][i]
                        sql2 = "INSERT INTO "+cf.config[5]+" (idf_number, number_order, major) \
                                       VALUES ('%s', '%d', '%s')" % \
                            (ticket.idf_number, ticket.order, ticket.major)
                        cursor.execute(sql2)

            db.commit()
            db.close()
            self.write("sort complete, results output table "+cf.config[5])
        except Exception, e:
            self.write("ERROR: "+e)

application = tornado.web.Application([
    (r"/sort", MainHandler),
])

if __name__ == "__main__":
    print "server is running ...."
    print "crt+c to exit"
    application.listen(8888)
    tornado.ioloop.IOLoop.current().start()
