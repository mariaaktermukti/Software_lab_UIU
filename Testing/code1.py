#selenium
import options
from selenium import webdriver
from selenium.webdriver.edge.service import Service

# To Keep Browser Open Indefinitely
options = webdriver.EdgeOptions()
options.add_experimental_option("detach", True)

#---------------------------------------------------------
#edge driver
service_obj = Service()
driver = webdriver.Edge(options=options, service=service_obj)

#-------------------------------------------------------------

#full screen
driver.maximize_window()
#driver.minimize_window()
 #---------------------------------------------------------

#browser open and access
driver.get("https://www.google.com")
print(driver.title) #Website name
print(driver.current_url) #Website Link

#----------------------------------------------------------
driver.get("https://www.facebook.com")

#-----------------------------------------
driver.back()
driver.forward()

driver.refresh() #browser reload

driver.close() #browser close
