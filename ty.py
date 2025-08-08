from selenium import webdriver
import HtmlTestRunner
import unittest
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys 
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.support import expected_conditions as EC
import time


ruta_driver = r"C:\Users\keison\Downloads\chromedriver-win32\chromedriver-win32\chromedriver.exe"

# servicio
service = Service(executable_pth=ruta_driver)

# Inicializar el navegador
driver = webdriver.Chrome(service=service)

driver.get("http://localhost/Tarea_6/login.php")

time.sleep(3)

try:
 
    #iniciar sesion
    user = WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.CSS_SELECTOR, "input[name='user']")))
    user.clear
    user.send_keys("20240228@itla.edu.do")
    
    password = WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.CSS_SELECTOR, "input[name='pass']")))
    password.clear
    password.send_keys("12345")
    
    but = WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.CSS_SELECTOR, "a[name='login']"))).click()
    

    WebDriverWait(driver, 10).until(
        EC.element_to_be_clickable((By.LINK_TEXT, "+ Agregar Personaje"))
    ).click()

    WebDriverWait(driver, 10).until(
        EC.presence_of_element_located((By.NAME, "nombre"))
    )

    driver.find_element(By.NAME, "nombre").send_keys("Roronoa Zoro")
    driver.find_element(By.NAME, "color").send_keys("Verde")
    driver.find_element(By.NAME, "tipo").send_keys("Sub-capitan")
    driver.find_element(By.NAME, "nivel").send_keys("320000000")
    
 
    
    
    button  = WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.CSS_SELECTOR, "button[name='create']"))).click()
    
    time.sleep(2)
    
    button  = WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.CSS_SELECTOR, "a[name='index']"))).click()
    
    
    time.sleep(2)
    
    WebDriverWait(driver, 10).until(
        EC.presence_of_element_located((By.XPATH, f"//td[contains(text(),'Roronoa Zoro')]"))
    )
    editar_boton = driver.find_element(By.XPATH, f"//td[contains(text(),'Roronoa Zoro')]/following-sibling::td//a[contains(text(),'Editar')]")
    editar_boton.click()

   
   #Selenium-Editar
   
    
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
    
 
    # Guardar edicion
    button  = WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.CSS_SELECTOR, "button[name='edit']"))).click()

    button  = WebDriverWait(driver, 10).until(EC.element_to_be_clickable((By.CSS_SELECTOR, "a[name='index']"))).click()
    
    time.sleep(3)
    
    
    #selenium-Eliminar
    
    WebDriverWait(driver, 10).until(
            EC.presence_of_element_located((By.XPATH, f"//td[contains(text(),'Roronoa Zoro')]"))
        )
    editar_boton = driver.find_element(By.XPATH, f"//td[contains(text(),'Roronoa Zoro')]/following-sibling::td//a[contains(text(),'Eliminar')]")
    editar_boton.click()

    time.sleep(3)

    WebDriverWait(driver, 2).until(EC.alert_is_present())
    alert = driver.switch_to.alert
    alert.accept()
    
    time.sleep(3)

    WebDriverWait(driver, 5).until(EC.alert_is_present())
    alert = driver.switch_to.alert
    alert.accept()

except Exception as e:
    print("❌ Error:", e)

finally:
     time.sleep(10)
     driver.quit()
     
if __name__ == '__main__':
    unittest.main(testRunner=HtmlTestRunner.HTMLTestRunner)  
