##########################################################################
# Tabbed Products Pro UNINSTALLER - 2019-07-10 - webchills
# NUR AUSFÜHREN WENN SIE DAS MODUL AUS DER DATENBANK ENTFERNEN WOLLEN!!!!!
##########################################################################

DELETE FROM configuration_group WHERE configuration_group_title LIKE '%Tabbed Products Pro - Configuration%';

DELETE FROM configuration WHERE configuration_key = 'TPP_SHOW_TAB_HEADERS';
DELETE FROM configuration WHERE configuration_key = 'TPP_GLOBAL_CUSTOM3_ON_TAB';
DELETE FROM configuration WHERE configuration_key = 'TPP_GLOBAL_CUSTOM2_ON_TAB';
DELETE FROM configuration WHERE configuration_key = 'TPP_GLOBAL_CUSTOM1_ON_TAB';
DELETE FROM configuration WHERE configuration_key = 'TPP_GLOBAL_REVIEWS_ON_TAB';
DELETE FROM configuration WHERE configuration_key = 'TPP_GLOBAL_CROSS_SELL_ON_TAB';
DELETE FROM configuration WHERE configuration_key = 'TPP_GLOBAL_CUST_ALSO_PURCH_ON_TAB';
DELETE FROM configuration WHERE configuration_key = 'TPP_GLOBAL_ADDL_IMAGES_ON_TAB';
DELETE FROM configuration WHERE configuration_key = 'TPP_GLOBAL_ADD_TO_CART_ON_TAB';
DELETE FROM configuration WHERE configuration_key = 'TPP_GLOBAL_DETAILS_ON_TAB';
DELETE FROM configuration WHERE configuration_key = 'TPP_GLOBAL_ATTRIBUTES_ON_ATC_TAB';
DELETE FROM configuration WHERE configuration_key = 'TPP_GLOBAL_ATTRIBUTES_ON_TAB';
DELETE FROM configuration WHERE configuration_key = 'TPP_GLOBAL_PROD_DESC_ON_TAB';
DELETE FROM configuration WHERE configuration_key = 'TPP_GLOBAL_MAIN_IMAGE_ON_TAB';
DELETE FROM configuration WHERE configuration_key = 'TPP_GLOBAL_ENABLE_TABS';
DELETE FROM configuration WHERE configuration_key = 'TPP_VERSION';

DELETE FROM admin_pages WHERE page_key='configTPP';