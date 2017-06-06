CREATE DATABASE Cimis;

USE Cimis;

DROP DATABASE Cimis;

ALTER DATABASE Cimis SET SINGLE_USER WITH ROLLBACK IMMEDIATE;
DROP DATABASE Cimis;

SELECT * from tb_salesagent;

SELECT * from tb_job_title;

SELECT * from tb_personal_info;

SELECT * from tb_contact_person;

SELECT * from tb_company_info;

SELECT * from tb_insurance;

SELECT * from tb_user_accounts;

SELECT * from tb_vehicle_type;

SELECT * from tb_address;

SELECT * from tb_bank_info;

SELECT * from tb_company_info;

SELECT * FROM tb_employee

SELECT * from tb_employee_type;

SELECT * from tb_complaint_type;

DELETE FROM tb_address;

DELETE FROM tb_courier;

SELECT * FROM tb_address WHERE add_ID = 1;

INSERT INTO tb_policy_status VALUES('Used','asd',0,'01-31-2017','01-31-2017');

UPDATE tb_company_info
SET del_flag=0;