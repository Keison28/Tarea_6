from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys 
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.support import expected_conditions as EC
import time


ruta_driver = r"C:\Users\keison\Downloads\chromedriver-win32\chromedriver-win32\chromedriver.exe"

service = Service(executable_pth=ruta_driver)

# Inicializar el navegador
driver = webdriver.Chrome(service=service)

# Abrir página de prueba
driver.get("http://localhost/Tarea_6/")

time.sleep(3)


WebDriverWait(driver, 10).until(
    EC.presence_of_element_located((By.XPATH, f"//td[contains(text(),'Roronoa Zoro')]"))
)
editar_boton = driver.find_element(By.XPATH, f"//td[contains(text(),'Roronoa Zoro')]/following-sibling::td//a[contains(text(),'Editar')]")
editar_boton.click()

WebDriverWait(driver, 10).until(
    EC.presence_of_element_located((By.NAME, "color"))
)

color = WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.CSS_SELECTOR, "input[name='color']" )))
color.clear()
color.send_keys("verde marino")

tipo = WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.CSS_SELECTOR, "input[name='tipo']" )))
tipo.clear()
tipo.send_keys("Espadachin")



time.sleep(1)
guardar_btn = WebDriverWait(driver, 10).until(
    EC.element_to_be_clickable((By.XPATH, "//button[@type='submit']"))
)
guardar_btn.click()



