f = open("fileconfig")

config = []
for line in f:
	config = line.split("|")
	if len(config)< 6:
		print "CAU HINH KHONG DAY DU"
	break
