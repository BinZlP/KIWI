from selenium import webdriver
from bs4 import BeautifulSoup
import urllib2

driver = webdriver.Chrome('/Users/HS/Downloads/chromedriver')
driver.implicitly_wait(3)

driver.get('https://info.kw.ac.kr')

driver.find_element_by_name('gubun_code').send_keys('11')
driver.find_element_by_name('member_no').send_keys('2017203044')
driver.find_element_by_name('password').send_keys('@Faksjdfi1')

driver.find_element_by_xpath('/html/body/form[2]/table/tbody/tr[2]/td/table[1]/tbody/tr/td[2]/table/tbody/tr[2]/td/table/tbody/tr[3]/td/table/tbody/tr/td/table/tbody/tr[3]/td[3]/input').click()

class_list = "https://info.kw.ac.kr/webnote/lecture/h_lecture.php?mode=view&user_opt=&skin_opt=&layout_opt=&show_hakbu=&this_year=2017&hakgi=2&sugang_opt=all&hh=&prof_name=&fsel1=00_00&fsel2=00_00&fsel4=00_00&captcha=2006&x=22&y=11"
driver.get(class_list)
#selector : body > table:nth-child(3) > tbody > tr > td:nth-child(2) > table > tbody > tr > td > table > tbody > tr:nth-child(2) > td:nth-child(2) > form:nth-child(8) > table:nth-child(7) > tbody > tr:nth-child(2) > td:nth-child(1)

soup = BeautifulSoup(urllib2.urlopen(class_list), read())
table = soup.find('table')
table_body = table.find('tbody')

rows = table_body.find_all('tr')



#for n in class_number:
#	class_number.split('-')

#str1 = '0000'
#str2 = '1'
#str3 = '0670'
#str4 = '02'


#url = "https://info.kw.ac.kr/webnote/lecture/h_lecture01_2.php?layout_opt=&this_year=2017&hakgi=2&open_major_code="+str1+"&open_grade="+str2+"&open_gwamok_no="+str3+"&bunban_no="+str4+"&gwamok_kname=%B0%FA%C7%D0%C3%B6%C7%D0%C0%C7%C0%CC%C7%D8&engineer_code=13&skin_opt=&fsel1_code=&fsel1_str=&fsel2_code=&fsel2_str=&fsel2=00_00&fsel3=&fsel4=00_00&hh=&sugang_opt=all&tmp_key=tmp__stu"

#driver.get(url)
#html = driver.page_source
#soup = bs(html,'html.parser')
