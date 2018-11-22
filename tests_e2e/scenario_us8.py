# -*- coding: utf-8 -*-
import time
from pyvirtualdisplay import Display
from selenium import webdriver
from selenium.webdriver.firefox.options import Options
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import WebDriverWait

print("teste2e for US8 starting... ")

display = Display(visible=0, size=(800,600))
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
elem.send_keys("TestProject")
elem = driver.find_element_by_id("content")
elem.click()
elem.send_keys("Description")
elem = driver.find_element_by_id("dureeSprint-input")
elem.click()
elem.send_keys("3")
elem = driver.find_element_by_id("date-input")
elem.click()
driver.execute_script("document.querySelector('input[type=\"date\"]').valueAsDate = new Date('01/01/1111')")

elem = driver.find_element(By.XPATH, '//form')
elem.submit()

wait = WebDriverWait(driver, timeout=10)
driver.get("http://localhost/project_list.php")
wait = WebDriverWait(driver, timeout=10)
assert "Liste des projets" in driver.title

elem = driver.find_element_by_id("project-backlog")
elem.click()
wait = WebDriverWait(driver, timeout=10)
assert "Liste des US" in driver.title

elem = driver.find_element_by_id("add_user_story_link")
elem.click()
wait = WebDriverWait(driver, timeout=10)

assert "Création d'une user story" in driver.title

elem = driver.find_element_by_id("number_us")
elem.click()
elem.send_keys("1")

elem = driver.find_element_by_id("priority_h")
elem.click()

elem = driver.find_element_by_id("difficulty")
elem.click()
elem.send_keys("1")

elem = driver.find_element_by_id("description")
elem.click()
elem.send_keys("description test")

elem = driver.find_element(By.XPATH, '//form')
elem.submit()

wait = WebDriverWait(driver, timeout=10)
driver.get("http://localhost/project_list.php")
wait = WebDriverWait(driver, timeout=10)
assert "Liste des projets" in driver.title

elem = driver.find_element_by_id("project-backlog")
elem.click()
wait = WebDriverWait(driver, timeout=10)
assert "Liste des US" in driver.title
elems = driver.find_elements_by_css_selector("li")
assert len(elems) > 0

print("teste2e for US8: done.")
print("all tests are done...")
driver.close()
