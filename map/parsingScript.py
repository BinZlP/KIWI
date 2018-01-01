import urllib, urllib2, sys, os
import requests
import csv
from bs4 import BeautifulSoup as bs

LOGIN_INFO = {
		'login_type' : '2',
		'check_svc' : '',
		'redirect_url' : 'http://info.kw.ac.kr/',
		'layout_opt' : '',
		'gubun_code' : '11',
		'member_no' : '2017203044',
		'password' : '@Faksjdfi1',
		'image.x' : '0',
		'image.y' : '0',
		'p_language' : 'KOREAN'
	}

with requests.Session() as s:
	#first_page = s.get('https://info.kw.ac.kr/')
	#html = first_page.text
	#soup = bs(html,'html.parser')
	login_req = s.post('https://info.kw.ac.kr/webnote/login/login_proc.php',data=LOGIN_INFO)
	#print(login_req.status_code)



head={'Cookie': "_ga=GA1.3.1392003369.1504745673; gubun_code=11; ip_test=223.194.44.41; kwuhashkey=5d3ae656734; languageName=KOREAN; member_no=2017203044; time_info=20170921165228; JSESSIONID=V64hZvvuD1NMXeKYj0WI2HyUQ0T42QuLEafjjrZK5iIEWh0N9xSaj55RIGqHHspn.info1_servlet_engine3; WMONID=g7K0d4oypFY",}
req = urllib2.Request('https://info.kw.ac.kr/', headers=head)
res = urllib2.urlopen(req).read()

# body > page > prnoff > table:nth-child(3) > tbody > tr > td:nth-child(2) > table > tbody > tr > td > table > tbody > tr:nth-child(2) > td:nth-child(2) > prnon > form > table:nth-child(11) > tbody > tr:nth-child(4) > td:nth-child(2)


str1 = '0000'
str2 = '1'
str3 = '0670'
str4 = '02'


#url = "https://info.kw.ac.kr/webnote/lecture/h_lecture01_2.php?layout_opt=&this_year=2017&hakgi=2&open_major_code="+str1+"&open_grade="+str2+"&open_gwamok_no="+str3+"&bunban_no="+str4+"&gwamok_kname=%B0%FA%C7%D0%C3%B6%C7%D0%C0%C7%C0%CC%C7%D8&engineer_code=13&skin_opt=&fsel1_code=&fsel1_str=&fsel2_code=&fsel2_str=&fsel2=00_00&fsel3=&fsel4=00_00&hh=&sugang_opt=all&tmp_key=tmp__stu"
#html = urllib2.urlopen(req).read()

#soup2 = BeautifulSoup(html, 'http.parser')

#getRoom = soup2.select(
#	'body > page > prnoff > table:nth-child(3) > tbody > tr > td:nth-child(2) > table > tbody > tr > td > table > tbody > tr:nth-child(2) > td:nth-child(2) > prnon > form > table:nth-child(11) > tbody > tr:nth-child(4) > td:nth-child(2)'
#	)

#print getRoom