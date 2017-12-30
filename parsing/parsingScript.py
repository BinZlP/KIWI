from selenium import webdriver

driver = webdriver.Chrome('E:\광운대\KIWI_Project\parsing\phantomjs\bin\phantomjs.exe')
driver.implicitly.wait(3)

driver.get('https://info.kw.ac.kr/')

driver.find_element_by_name('gubun_code').send_keys('11')
driver.find_element_by_name('member_no').send_keys('2017203044')
driver.find_element_by_name('password').send_keys('@Faksjdfi1')

driver.find_element_by_xpath('/html/body/form[2]/table/tbody/tr[2]/td/table[1]/tbody/tr/td[2]/table/tbody/tr[2]/td/table/tbody/tr[3]/td/table/tbody/tr/td/table/tbody/tr[3]/td[3]/input').click()

