import time
from pyvirtualdisplay import Display
from selenium import webdriver
from selenium.webdriver.firefox.options import Options
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import WebDriverWait

display = Display(visible=0, size=(800, 600))
display.start()

driver = webdriver.Firefox()
driver.get("http://localhost/project_list.php")
wait = WebDriverWait(driver, timeout=10)
print(driver.title)
assert "Liste des projets" in driver.title
elem = driver.find_element_by_id("add_project_link")
elem.click()
wait = WebDriverWait(driver, timeout=10)
print(driver.title)
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
driver.execute_script("document.querySelector('input[type=\"date\"]').valueAsDate = new Date('07/12/2019')")

elem = driver.find_element(By.XPATH, '//form')
elem.submit()

wait = WebDriverWait(driver, timeout=10)
driver.get("http://localhost/project_list.php")
print(driver.title)
assert "Liste des projets" in driver.title
wait = WebDriverWait(driver, timeout=10)
elems = driver.find_elements(By.XPATH, '//li/a[text()="TestProject"]')
assert len(elems) > 0
driver.close()
