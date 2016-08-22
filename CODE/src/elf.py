#!/usr/bin/python
#-*- coding: utf-8 -*-
import sys
import MySQLdb
import time

reload(sys)
sys.setdefaultencoding('utf-8')
 
while True:
	time.sleep(3)
	try:
		conn=MySQLdb.connect(host='localhost',user='heo',passwd='heo123',db='thinkphp',port=3306,charset='utf8')
		cur=conn.cursor()
		cur.execute('select tid,status,availabletime,accomplishtime from think_task_info')
		tid = 0
		availabletime = 0
		accomplishtime = 0
		sql = ''
		status = '';
		origin_status = '';
		for i in cur.fetchall():
			index = 0
			for j in i:
				if index == 0:
					tid = j
				if index == 1:
					origin_status = j
				elif index == 2:
					availabletime = time.mktime(time.strptime(str(j),"%Y-%m-%d %H:%M:%S"))
				elif index == 3:
					accomplishtime = time.mktime(time.strptime(str(j),"%Y-%m-%d %H:%M:%S"))
				index = index + 1
			if availabletime < time.time() and origin_status != 'ExcessAvailable' and origin_status != 'ExcessAccomplish':
				status = '"ExcessAvailable"'
			if accomplishtime < time.time() and origin_status != 'ExcessAccomplish':
				status = '"ExcessAccomplish"'
			if status != '':
				sql = 'update think_task_info set status = ' + status +  ' where tid = ' + str(tid)
			if sql != '':
				print sql
				cur.execute(sql)
		conn.commit()
		cur.close()
		conn.close()
	except MySQLdb.Error,e:
		print "Mysql Error %d: %s" % (e.args[0], e.args[1])
