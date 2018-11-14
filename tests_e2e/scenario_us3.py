import time
from pyvirtualdisplay import Display
from selenium import webdriver
from selenium.webdriver.firefox.options import Options
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By

display = Display(visible=0, size=(800, 600))
display.start()

driver = webdriver.Firefox()
driver.get("http://localhost/project_list.php")
assert "Liste des projets" in driver.title
elem = driver.find_element_by_id("add_project_link")
elem.click()
assert "Ajouter un projet" in driver.title
elem = driver.find_element_by_id("name-input")
elem.click()
elem.send_keys("TestProject")
elem = driver.find_element_by_id("content")
elem.click()
elem.send_keys("Description")
elem = driver.find_element_by_id("dureeSprint-input")
elem.click()
elem.send_keys("3")
elem = driver.find_element_by_id("date-input")
elem.click()
elem.send_keys("11/07/2019")
elem.submit()
time.sleep(1)
assert "Liste des projets" in driver.title
elems = driver.find_elements(By.XPATH, '//li/span[text()="TestProject"]')
assert len(elems) == 1 
driver.close()
