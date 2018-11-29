# -*- coding: utf-8 -*-
import time
from pyvirtualdisplay import Display
from selenium import webdriver
from selenium.webdriver.firefox.options import Options
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import WebDriverWait

print("teste2e for US9 starting... ")

display = Display(visible=0, size=(800, 600))
display.start()

driver = webdriver.Firefox()
driver.get("http://localhost/index.php")

elem = driver.find_element(By.XPATH, '//input[@name=\"username\"]')
elem.click()
elem.send_keys("root")
elem = driver.find_element(By.XPATH, '//input[@name=\"password\"]')
elem.click()
elem.send_keys("root")
elem = driver.find_element(By.XPATH, '//input[@type=\"submit\"]')
elem.click()

wait = WebDriverWait(driver, timeout=10)
assert "Liste des projets" in driver.title

elem = driver.find_element_by_id("add_project_link")
elem.click()
wait = WebDriverWait(driver, timeout=10)

assert "Ajouter un projet" in driver.title
elem = driver.find_element_by_id("name-input")
elem.click()
elem.send_keys("TestProjectUS9")
elem = driver.find_element_by_id("content")
elem.click()
elem.send_keys("Description")
elem = driver.find_element_by_id("dureeSprint-input")
elem.click()
elem.send_keys("3")
elem = driver.find_element_by_id("date-input")
elem.click()
driver.execute_script("document.querySelector('input[type=\"date\"]').valueAsDate = new Date('06/04/2019')")

elem = driver.find_element(By.XPATH, '//form')
elem.submit()

wait = WebDriverWait(driver, timeout=10)
driver.get("http://localhost/project_list.php")

assert "Liste des projets" in driver.title
wait = WebDriverWait(driver, timeout=10)

elem = driver.find_element_by_link_text("TestProjectUS9")
elem.click()
wait = WebDriverWait(driver, timeout=10)
print(driver.title)
assert "Les détails de ce projet :" in driver.title

elem = driver.find_element_by_id("backlog-button")
elem.click()
wait = WebDriverWait(driver, timeout=10)
assert "Liste des US" in driver.title

elem = driver.find_element_by_id("add_user_story_link")
elem.click()

wait = WebDriverWait(driver, timeout=10)
assert "Création d'une user story" in driver.title

elem = driver.find_element_by_id("number_us")
elem.click()
elem.send_keys("2")

elem = driver.find_element_by_id("priority_h")
elem.click()

elem = driver.find_element_by_id("difficulty")
elem.click()
elem.send_keys("3")

elem = driver.find_element_by_id("description")
elem.click()
elem.send_keys("description test")

elem = driver.find_element(By.XPATH, '//form')
elem.submit()

wait = WebDriverWait(driver, timeout=10)
driver.get("http://localhost/project_list.php")

wait = WebDriverWait(driver, timeout=10)
assert "Liste des projets" in driver.title

elem = driver.find_element_by_link_text("TestProjectUS9")
elem.click()
wait = WebDriverWait(driver, timeout=10)
print(driver.title)
assert "Les détails de ce projet :" in driver.title

elem = driver.find_element_by_id("backlog-button")
elem.click()
wait = WebDriverWait(driver, timeout=10)
assert "Liste des US" in driver.title
elems = driver.find_elements_by_css_selector("li")
assert len(elems) > 0

elem = driver.find_element_by_id("delete-us-2")
elem.click()
alert = driver.switch_to.alert
alert.accept()
wait = WebDriverWait(driver, timeout=10)
assert "Liste des US" in driver.title
try:
    elem = driver.find_element_by_id("delete-us-2")
except NoSuchElementException:
    assert True
    pass
except Exception:
    assert False

#confirm delete
#check if us was deleted

print("teste2e for US9: done.")
driver.close()
