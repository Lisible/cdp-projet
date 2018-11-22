# -*- coding: utf-8 -*-
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

elem = driver.find_element_by_id("project_name")
wait = WebDriverWait(driver, timeout=10)
assert ("Les détails de ce projet:").decode('utf-8') in (driver.title).encode('utf-8').decode('utf-8')

elem = driver.find_element_by_id("sprint-button")
elem.click()
wait = WebDriverWait(driver, timeout=10)
assert "Liste des sprints" in driver.title

elem = driver.find_element_by_id("add-sprint")
elem.click()
wait = WebDriverWait(driver, timeout=10)
assert "Liste des sprints" in driver.title

nbsprints = driver.find_elements_by_css_selector("li")
assert len(nbsprints) > 0

driver.close();
