--------------------------------------------------------
--  File created - Friday-June-05-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Table ADMIN
--------------------------------------------------------

  CREATE TABLE "OT"."ADMIN" 
   (	"ADMINEMAIL" VARCHAR2(255 BYTE), 
	"ADMINPASSWORD" VARCHAR2(100 BYTE)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table FAKULTAS
--------------------------------------------------------

  CREATE TABLE "OT"."FAKULTAS" 
   (	"FAKULTASID" NUMBER GENERATED BY DEFAULT AS IDENTITY MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE , 
	"FAKULTASNAME" VARCHAR2(100 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table FORM
--------------------------------------------------------

  CREATE TABLE "OT"."FORM" 
   (	"FORMID" NUMBER GENERATED BY DEFAULT AS IDENTITY MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE , 
	"FORMLISTID" NUMBER, 
	"FORMDATESTART" DATE, 
	"FORMDATEEND" DATE, 
	"USERJOBID" NUMBER, 
	"FORMSTATUS" NUMBER(1,0) DEFAULT 1, 
	"PUBLICS" NUMBER(1,0) DEFAULT 0, 
	"LECTURER" NUMBER(1,0) DEFAULT 0, 
	"STUDENT" NUMBER(1,0) DEFAULT 0, 
	"STAFF" NUMBER(1,0) DEFAULT 0
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table FORMANSWER
--------------------------------------------------------

  CREATE TABLE "OT"."FORMANSWER" 
   (	"FORMANSWERID" NUMBER GENERATED BY DEFAULT AS IDENTITY MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE , 
	"USEREMAIL" VARCHAR2(100 BYTE), 
	"FORMID" NUMBER, 
	"FORMANSWERDATE" DATE, 
	"FORMANSWERSTATUS" NUMBER(1,0) DEFAULT 0
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table FORMANSWERDETAIL
--------------------------------------------------------

  CREATE TABLE "OT"."FORMANSWERDETAIL" 
   (	"FORMANSWERDETAILID" NUMBER GENERATED BY DEFAULT AS IDENTITY MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE , 
	"FORMQUESTIONID" NUMBER, 
	"FORMANSWERID" NUMBER, 
	"FORMANSWERDETAILVALUE" VARCHAR2(100 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table FORMLIST
--------------------------------------------------------

  CREATE TABLE "OT"."FORMLIST" 
   (	"FORMLISTID" NUMBER GENERATED BY DEFAULT AS IDENTITY MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE , 
	"FORMLISTTITLE" VARCHAR2(200 BYTE), 
	"FORMLISTDATE" DATE, 
	"FORMLISTTOTALSECTION" NUMBER, 
	"FORMLISTTOTALQUESTION" NUMBER
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table FORMPUBLISH
--------------------------------------------------------

  CREATE TABLE "OT"."FORMPUBLISH" 
   (	"FORMPUBLISHID" NUMBER GENERATED BY DEFAULT AS IDENTITY MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE , 
	"FORMID" NUMBER, 
	"FORMQUESTIONID" NUMBER, 
	"STAFF" NUMBER(1,0) DEFAULT 0, 
	"LECTURER" NUMBER(1,0) DEFAULT 0, 
	"STUDENT" NUMBER(1,0) DEFAULT 0, 
	"PUBLICS" NUMBER(1,0) DEFAULT 0, 
	"TREND" NUMBER(1,0) DEFAULT 0
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table FORMQUESTION
--------------------------------------------------------

  CREATE TABLE "OT"."FORMQUESTION" 
   (	"FORMQUESTIONID" NUMBER GENERATED BY DEFAULT AS IDENTITY MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE , 
	"FORMLISTID" NUMBER, 
	"FORMQUESTIONNAME" VARCHAR2(200 BYTE), 
	"FORMQUESTIONTYPEID" NUMBER, 
	"FORMREQUIRED" NUMBER(1,0) DEFAULT 0, 
	"FORMDESCRIPTION" VARCHAR2(200 BYTE), 
	"FORMIMAGE" VARCHAR2(200 BYTE), 
	"FORMQUESTIONPOSITION" NUMBER, 
	"FORMQUESTIONSECTION" NUMBER
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table FORMQUESTIONFILE
--------------------------------------------------------

  CREATE TABLE "OT"."FORMQUESTIONFILE" 
   (	"FORMQUESTIONFILEID" NUMBER, 
	"FORMQUESTIONID" NUMBER, 
	"FORMQUESTIONFILETYPE" VARCHAR2(100 BYTE) DEFAULT NULL, 
	"FORMQUESTIONFILEMAXFILE" NUMBER, 
	"FORMQUESTIONFILEMAXSIZE" NUMBER
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table FORMQUESTIONOPTION
--------------------------------------------------------

  CREATE TABLE "OT"."FORMQUESTIONOPTION" 
   (	"FORMQUESTIONOPTIONID" NUMBER GENERATED BY DEFAULT AS IDENTITY MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE , 
	"FORMQUESTIONID" NUMBER, 
	"FORMQUESTIONVALUE" VARCHAR2(200 BYTE), 
	"FORMQUESTIONOPTIONOTHERS" VARCHAR2(200 BYTE) DEFAULT NULL, 
	"FORMQUESTIONOPTIONROWPOSITION" NUMBER, 
	"FORMQUESTIONOPTIONNEXTSECTION" NUMBER(1,0) DEFAULT 0
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table FORMQUESTIONTYPE
--------------------------------------------------------

  CREATE TABLE "OT"."FORMQUESTIONTYPE" 
   (	"FORMQUESTIONTYPEID" NUMBER, 
	"FORMQUESTIONTYPENAME" VARCHAR2(100 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table LECTURER
--------------------------------------------------------

  CREATE TABLE "OT"."LECTURER" 
   (	"USERDATAEMAIL" VARCHAR2(100 BYTE), 
	"PRODIID" NUMBER, 
	"FAKULTASID" NUMBER, 
	"LECTURERNID" VARCHAR2(100 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table PRODI
--------------------------------------------------------

  CREATE TABLE "OT"."PRODI" 
   (	"PRODIID" NUMBER GENERATED BY DEFAULT AS IDENTITY MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE , 
	"PRODINAME" VARCHAR2(100 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table STUDENT
--------------------------------------------------------

  CREATE TABLE "OT"."STUDENT" 
   (	"USERDATAEMAIL" VARCHAR2(100 BYTE), 
	"STUDENTNIM" NUMBER, 
	"PRODIID" NUMBER, 
	"FAKULTASID" NUMBER, 
	"STUDENTANGKATAN" NUMBER
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table USERDATA
--------------------------------------------------------

  CREATE TABLE "OT"."USERDATA" 
   (	"USERDATAEMAIL" VARCHAR2(100 BYTE), 
	"USERDATAPASSWORD" VARCHAR2(100 BYTE), 
	"USERDATAJOBID" NUMBER, 
	"USERDATAAUTHKEY" VARCHAR2(100 BYTE), 
	"USERDATAID" NUMBER
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table USERJOB
--------------------------------------------------------

  CREATE TABLE "OT"."USERJOB" 
   (	"USERJOBID" NUMBER GENERATED BY DEFAULT AS IDENTITY MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE , 
	"USERJOBNAME" VARCHAR2(100 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
REM INSERTING into OT.ADMIN
SET DEFINE OFF;
REM INSERTING into OT.FAKULTAS
SET DEFINE OFF;
Insert into OT.FAKULTAS (FAKULTASID,FAKULTASNAME) values (1,'Teknik dan Informatika');
Insert into OT.FAKULTAS (FAKULTASID,FAKULTASNAME) values (2,'Seni dan Desain');
Insert into OT.FAKULTAS (FAKULTASID,FAKULTASNAME) values (3,'Ilmu Komunikasi');
Insert into OT.FAKULTAS (FAKULTASID,FAKULTASNAME) values (4,'Bisnis');
REM INSERTING into OT.FORM
SET DEFINE OFF;
Insert into OT.FORM (FORMID,FORMLISTID,FORMDATESTART,FORMDATEEND,USERJOBID,FORMSTATUS,PUBLICS,LECTURER,STUDENT,STAFF) values (51,146,to_date('05-JUN-20','DD-MON-RR'),to_date('05-JUN-20','DD-MON-RR'),3,0,1,0,1,1);
Insert into OT.FORM (FORMID,FORMLISTID,FORMDATESTART,FORMDATEEND,USERJOBID,FORMSTATUS,PUBLICS,LECTURER,STUDENT,STAFF) values (50,145,to_date('05-MAR-20','DD-MON-RR'),to_date('05-MAR-20','DD-MON-RR'),3,1,0,0,1,1);
Insert into OT.FORM (FORMID,FORMLISTID,FORMDATESTART,FORMDATEEND,USERJOBID,FORMSTATUS,PUBLICS,LECTURER,STUDENT,STAFF) values (53,145,to_date('05-JUN-20','DD-MON-RR'),to_date('05-JUN-20','DD-MON-RR'),3,0,0,0,1,0);
Insert into OT.FORM (FORMID,FORMLISTID,FORMDATESTART,FORMDATEEND,USERJOBID,FORMSTATUS,PUBLICS,LECTURER,STUDENT,STAFF) values (49,145,to_date('05-JAN-20','DD-MON-RR'),to_date('05-JUN-20','DD-MON-RR'),3,0,0,0,1,0);
REM INSERTING into OT.FORMANSWER
SET DEFINE OFF;
Insert into OT.FORMANSWER (FORMANSWERID,USEREMAIL,FORMID,FORMANSWERDATE,FORMANSWERSTATUS) values (3,'kevin.hendy@student.umn.ac.id',49,to_date('05-JUN-20','DD-MON-RR'),1);
Insert into OT.FORMANSWER (FORMANSWERID,USEREMAIL,FORMID,FORMANSWERDATE,FORMANSWERSTATUS) values (4,'kevin.hendy@student.umn.ac.id',51,to_date('05-JUN-20','DD-MON-RR'),1);
Insert into OT.FORMANSWER (FORMANSWERID,USEREMAIL,FORMID,FORMANSWERDATE,FORMANSWERSTATUS) values (1,'kevin.hendy@student.umn.ac.id',50,to_date('05-JUN-20','DD-MON-RR'),1);
Insert into OT.FORMANSWER (FORMANSWERID,USEREMAIL,FORMID,FORMANSWERDATE,FORMANSWERSTATUS) values (2,'kevin.hendy@student.umn.ac.id',53,to_date('05-JUN-20','DD-MON-RR'),1);
Insert into OT.FORMANSWER (FORMANSWERID,USEREMAIL,FORMID,FORMANSWERDATE,FORMANSWERSTATUS) values (5,'rully.saputra@student.umn.ac.id',50,to_date('05-JUN-20','DD-MON-RR'),1);
Insert into OT.FORMANSWER (FORMANSWERID,USEREMAIL,FORMID,FORMANSWERDATE,FORMANSWERSTATUS) values (6,'rully.saputra@student.umn.ac.id',53,to_date('05-JUN-20','DD-MON-RR'),1);
Insert into OT.FORMANSWER (FORMANSWERID,USEREMAIL,FORMID,FORMANSWERDATE,FORMANSWERSTATUS) values (7,'rully.saputra@student.umn.ac.id',49,to_date('05-JUN-20','DD-MON-RR'),1);
Insert into OT.FORMANSWER (FORMANSWERID,USEREMAIL,FORMID,FORMANSWERDATE,FORMANSWERSTATUS) values (8,'rully.saputra@student.umn.ac.id',51,to_date('05-JUN-20','DD-MON-RR'),1);
REM INSERTING into OT.FORMANSWERDETAIL
SET DEFINE OFF;
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (14,112,3,'00000019921');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (15,113,3,'Kevin Hendy');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (16,114,3,'Ya');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (17,115,3,'Proyek Sistem Tematik');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (18,115,3,'Mobile Programming');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (19,115,3,'Maching Learning');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (20,116,3,'5');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (21,117,4,'5');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (22,118,4,'Fitur Search');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (23,118,4,'Fitur Create');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (24,118,4,'Fitur Share');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (25,118,4,'Fitur Graph');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (3,114,1,'Ya');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (4,115,1,'Riset Teknologi Informasi');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (5,115,1,'Proyek Sistem Tematik');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (6,115,1,'Mobile Programming');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (7,116,1,'5');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (8,112,2,'00000019921');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (9,113,2,'Kevin Hendy');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (10,114,2,'Tidak');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (11,115,2,'Mobile Programming');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (1,112,1,'00000019921');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (2,113,1,'Kevin Hendy');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (12,115,2,'Maching Learning');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (13,116,2,'2');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (26,112,5,'00000018917');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (27,113,5,'Rully Saputra');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (28,114,5,'Tidak');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (29,115,5,'Proyek Sistem Tematik');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (30,115,5,'Mobile Programming');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (31,115,5,'Maching Learning');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (32,115,5,'Technopreneur');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (33,116,5,'1');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (34,112,6,'00000018917');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (35,113,6,'Rully Saputra');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (36,114,6,'Tidak');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (37,115,6,'Proyek Sistem Tematik');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (38,115,6,'Mobile Programming');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (39,116,6,'2');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (40,112,7,'00000018917');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (41,113,7,'Rully Saputra');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (42,114,7,'Tidak');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (43,115,7,'Mobile Programming');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (44,115,7,'Maching Learning');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (45,116,7,'2');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (46,117,8,'4');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (47,118,8,'Fitur Create');
Insert into OT.FORMANSWERDETAIL (FORMANSWERDETAILID,FORMQUESTIONID,FORMANSWERID,FORMANSWERDETAILVALUE) values (48,118,8,'Fitur Share');
REM INSERTING into OT.FORMLIST
SET DEFINE OFF;
Insert into OT.FORMLIST (FORMLISTID,FORMLISTTITLE,FORMLISTDATE,FORMLISTTOTALSECTION,FORMLISTTOTALQUESTION) values (146,'Survey Penilaian Tematik',to_date('05-JUN-20','DD-MON-RR'),0,2);
Insert into OT.FORMLIST (FORMLISTID,FORMLISTTITLE,FORMLISTDATE,FORMLISTTOTALSECTION,FORMLISTTOTALQUESTION) values (145,'Survey Kuliah Asinkron UMN 2020',to_date('05-JUN-20','DD-MON-RR'),0,5);
REM INSERTING into OT.FORMPUBLISH
SET DEFINE OFF;
Insert into OT.FORMPUBLISH (FORMPUBLISHID,FORMID,FORMQUESTIONID,STAFF,LECTURER,STUDENT,PUBLICS,TREND) values (44,51,117,0,1,1,1,0);
Insert into OT.FORMPUBLISH (FORMPUBLISHID,FORMID,FORMQUESTIONID,STAFF,LECTURER,STUDENT,PUBLICS,TREND) values (45,49,114,0,1,1,0,0);
Insert into OT.FORMPUBLISH (FORMPUBLISHID,FORMID,FORMQUESTIONID,STAFF,LECTURER,STUDENT,PUBLICS,TREND) values (47,53,115,1,0,1,0,1);
Insert into OT.FORMPUBLISH (FORMPUBLISHID,FORMID,FORMQUESTIONID,STAFF,LECTURER,STUDENT,PUBLICS,TREND) values (46,49,114,0,1,1,0,1);
REM INSERTING into OT.FORMQUESTION
SET DEFINE OFF;
Insert into OT.FORMQUESTION (FORMQUESTIONID,FORMLISTID,FORMQUESTIONNAME,FORMQUESTIONTYPEID,FORMREQUIRED,FORMDESCRIPTION,FORMIMAGE,FORMQUESTIONPOSITION,FORMQUESTIONSECTION) values (117,146,'Seberapa bangga kamu dengan projek ini?',6,1,null,null,0,0);
Insert into OT.FORMQUESTION (FORMQUESTIONID,FORMLISTID,FORMQUESTIONNAME,FORMQUESTIONTYPEID,FORMREQUIRED,FORMDESCRIPTION,FORMIMAGE,FORMQUESTIONPOSITION,FORMQUESTIONSECTION) values (118,146,'Fitur apa saja yang kamu ketahui?',4,0,null,null,1,0);
Insert into OT.FORMQUESTION (FORMQUESTIONID,FORMLISTID,FORMQUESTIONNAME,FORMQUESTIONTYPEID,FORMREQUIRED,FORMDESCRIPTION,FORMIMAGE,FORMQUESTIONPOSITION,FORMQUESTIONSECTION) values (112,145,'NIM',1,1,'NIM Lengkap (contoh: 000000*****)',null,0,0);
Insert into OT.FORMQUESTION (FORMQUESTIONID,FORMLISTID,FORMQUESTIONNAME,FORMQUESTIONTYPEID,FORMREQUIRED,FORMDESCRIPTION,FORMIMAGE,FORMQUESTIONPOSITION,FORMQUESTIONSECTION) values (113,145,'Nama Lengkap',2,1,null,null,1,0);
Insert into OT.FORMQUESTION (FORMQUESTIONID,FORMLISTID,FORMQUESTIONNAME,FORMQUESTIONTYPEID,FORMREQUIRED,FORMDESCRIPTION,FORMIMAGE,FORMQUESTIONPOSITION,FORMQUESTIONSECTION) values (114,145,'Apakah perkuliahan asinkron meningkatkan daya pembelajaran anda?',3,1,null,null,2,0);
Insert into OT.FORMQUESTION (FORMQUESTIONID,FORMLISTID,FORMQUESTIONNAME,FORMQUESTIONTYPEID,FORMREQUIRED,FORMDESCRIPTION,FORMIMAGE,FORMQUESTIONPOSITION,FORMQUESTIONSECTION) values (115,145,'Mata kuliah apa saja yang di asinkronkan saat ini?',4,0,null,null,3,0);
Insert into OT.FORMQUESTION (FORMQUESTIONID,FORMLISTID,FORMQUESTIONNAME,FORMQUESTIONTYPEID,FORMREQUIRED,FORMDESCRIPTION,FORMIMAGE,FORMQUESTIONPOSITION,FORMQUESTIONSECTION) values (116,145,'Seberapa besar kamu menyukai kelas asinkron?',6,1,null,null,4,0);
REM INSERTING into OT.FORMQUESTIONFILE
SET DEFINE OFF;
REM INSERTING into OT.FORMQUESTIONOPTION
SET DEFINE OFF;
Insert into OT.FORMQUESTIONOPTION (FORMQUESTIONOPTIONID,FORMQUESTIONID,FORMQUESTIONVALUE,FORMQUESTIONOPTIONOTHERS,FORMQUESTIONOPTIONROWPOSITION,FORMQUESTIONOPTIONNEXTSECTION) values (151,118,'Fitur Create',null,1,0);
Insert into OT.FORMQUESTIONOPTION (FORMQUESTIONOPTIONID,FORMQUESTIONID,FORMQUESTIONVALUE,FORMQUESTIONOPTIONOTHERS,FORMQUESTIONOPTIONROWPOSITION,FORMQUESTIONOPTIONNEXTSECTION) values (152,118,'Fitur Share',null,2,0);
Insert into OT.FORMQUESTIONOPTION (FORMQUESTIONOPTIONID,FORMQUESTIONID,FORMQUESTIONVALUE,FORMQUESTIONOPTIONOTHERS,FORMQUESTIONOPTIONROWPOSITION,FORMQUESTIONOPTIONNEXTSECTION) values (149,117,null,null,0,0);
Insert into OT.FORMQUESTIONOPTION (FORMQUESTIONOPTIONID,FORMQUESTIONID,FORMQUESTIONVALUE,FORMQUESTIONOPTIONOTHERS,FORMQUESTIONOPTIONROWPOSITION,FORMQUESTIONOPTIONNEXTSECTION) values (150,118,'Fitur Search',null,0,0);
Insert into OT.FORMQUESTIONOPTION (FORMQUESTIONOPTIONID,FORMQUESTIONID,FORMQUESTIONVALUE,FORMQUESTIONOPTIONOTHERS,FORMQUESTIONOPTIONROWPOSITION,FORMQUESTIONOPTIONNEXTSECTION) values (153,118,'Fitur Graph',null,3,0);
Insert into OT.FORMQUESTIONOPTION (FORMQUESTIONOPTIONID,FORMQUESTIONID,FORMQUESTIONVALUE,FORMQUESTIONOPTIONOTHERS,FORMQUESTIONOPTIONROWPOSITION,FORMQUESTIONOPTIONNEXTSECTION) values (142,114,'Ya',null,0,0);
Insert into OT.FORMQUESTIONOPTION (FORMQUESTIONOPTIONID,FORMQUESTIONID,FORMQUESTIONVALUE,FORMQUESTIONOPTIONOTHERS,FORMQUESTIONOPTIONROWPOSITION,FORMQUESTIONOPTIONNEXTSECTION) values (143,114,'Tidak',null,1,0);
Insert into OT.FORMQUESTIONOPTION (FORMQUESTIONOPTIONID,FORMQUESTIONID,FORMQUESTIONVALUE,FORMQUESTIONOPTIONOTHERS,FORMQUESTIONOPTIONROWPOSITION,FORMQUESTIONOPTIONNEXTSECTION) values (144,115,'Riset Teknologi Informasi',null,0,0);
Insert into OT.FORMQUESTIONOPTION (FORMQUESTIONOPTIONID,FORMQUESTIONID,FORMQUESTIONVALUE,FORMQUESTIONOPTIONOTHERS,FORMQUESTIONOPTIONROWPOSITION,FORMQUESTIONOPTIONNEXTSECTION) values (145,115,'Proyek Sistem Tematik',null,1,0);
Insert into OT.FORMQUESTIONOPTION (FORMQUESTIONOPTIONID,FORMQUESTIONID,FORMQUESTIONVALUE,FORMQUESTIONOPTIONOTHERS,FORMQUESTIONOPTIONROWPOSITION,FORMQUESTIONOPTIONNEXTSECTION) values (146,115,'Mobile Programming',null,2,0);
Insert into OT.FORMQUESTIONOPTION (FORMQUESTIONOPTIONID,FORMQUESTIONID,FORMQUESTIONVALUE,FORMQUESTIONOPTIONOTHERS,FORMQUESTIONOPTIONROWPOSITION,FORMQUESTIONOPTIONNEXTSECTION) values (147,115,'Maching Learning',null,3,0);
Insert into OT.FORMQUESTIONOPTION (FORMQUESTIONOPTIONID,FORMQUESTIONID,FORMQUESTIONVALUE,FORMQUESTIONOPTIONOTHERS,FORMQUESTIONOPTIONROWPOSITION,FORMQUESTIONOPTIONNEXTSECTION) values (148,116,null,null,0,0);
Insert into OT.FORMQUESTIONOPTION (FORMQUESTIONOPTIONID,FORMQUESTIONID,FORMQUESTIONVALUE,FORMQUESTIONOPTIONOTHERS,FORMQUESTIONOPTIONROWPOSITION,FORMQUESTIONOPTIONNEXTSECTION) values (154,115,'Technopreneur',null,4,0);
Insert into OT.FORMQUESTIONOPTION (FORMQUESTIONOPTIONID,FORMQUESTIONID,FORMQUESTIONVALUE,FORMQUESTIONOPTIONOTHERS,FORMQUESTIONOPTIONROWPOSITION,FORMQUESTIONOPTIONNEXTSECTION) values (140,112,null,null,0,0);
Insert into OT.FORMQUESTIONOPTION (FORMQUESTIONOPTIONID,FORMQUESTIONID,FORMQUESTIONVALUE,FORMQUESTIONOPTIONOTHERS,FORMQUESTIONOPTIONROWPOSITION,FORMQUESTIONOPTIONNEXTSECTION) values (141,113,null,null,0,0);
REM INSERTING into OT.FORMQUESTIONTYPE
SET DEFINE OFF;
Insert into OT.FORMQUESTIONTYPE (FORMQUESTIONTYPEID,FORMQUESTIONTYPENAME) values (1,'Short Answer');
Insert into OT.FORMQUESTIONTYPE (FORMQUESTIONTYPEID,FORMQUESTIONTYPENAME) values (2,'Paragraph');
Insert into OT.FORMQUESTIONTYPE (FORMQUESTIONTYPEID,FORMQUESTIONTYPENAME) values (3,'Multiple Choice');
Insert into OT.FORMQUESTIONTYPE (FORMQUESTIONTYPEID,FORMQUESTIONTYPENAME) values (4,'Checkboxes');
Insert into OT.FORMQUESTIONTYPE (FORMQUESTIONTYPEID,FORMQUESTIONTYPENAME) values (6,'Linear Scale');
REM INSERTING into OT.LECTURER
SET DEFINE OFF;
Insert into OT.LECTURER (USERDATAEMAIL,PRODIID,FAKULTASID,LECTURERNID) values ('alethea@umn.ac.id',1,1,'14045');
Insert into OT.LECTURER (USERDATAEMAIL,PRODIID,FAKULTASID,LECTURERNID) values ('andre.rusli@umn.ac.id',1,1,'14046');
REM INSERTING into OT.PRODI
SET DEFINE OFF;
Insert into OT.PRODI (PRODIID,PRODINAME) values (1,'Informatika');
Insert into OT.PRODI (PRODIID,PRODINAME) values (2,'Sistem informasi');
Insert into OT.PRODI (PRODIID,PRODINAME) values (3,'Teknik Komputer');
Insert into OT.PRODI (PRODIID,PRODINAME) values (4,'DKV');
Insert into OT.PRODI (PRODIID,PRODINAME) values (5,'Arsitektur');
Insert into OT.PRODI (PRODIID,PRODINAME) values (6,'Film');
Insert into OT.PRODI (PRODIID,PRODINAME) values (7,'Komunikasi strategis');
Insert into OT.PRODI (PRODIID,PRODINAME) values (8,'Jurnalistik');
Insert into OT.PRODI (PRODIID,PRODINAME) values (9,'Managemen');
Insert into OT.PRODI (PRODIID,PRODINAME) values (10,'Akuntansi');
Insert into OT.PRODI (PRODIID,PRODINAME) values (11,'Teknik Fisika');
Insert into OT.PRODI (PRODIID,PRODINAME) values (13,'Perhotelan');
Insert into OT.PRODI (PRODIID,PRODINAME) values (12,'Teknik Elektro');
REM INSERTING into OT.STUDENT
SET DEFINE OFF;
Insert into OT.STUDENT (USERDATAEMAIL,STUDENTNIM,PRODIID,FAKULTASID,STUDENTANGKATAN) values ('rully.saputra@student.umn.ac.id',13889,1,1,2016);
Insert into OT.STUDENT (USERDATAEMAIL,STUDENTNIM,PRODIID,FAKULTASID,STUDENTANGKATAN) values ('kevin.hendy@student.umn.ac.id',13890,2,1,2017);
Insert into OT.STUDENT (USERDATAEMAIL,STUDENTNIM,PRODIID,FAKULTASID,STUDENTANGKATAN) values ('john.doe@student.umn.ac.id',13891,4,2,2018);
Insert into OT.STUDENT (USERDATAEMAIL,STUDENTNIM,PRODIID,FAKULTASID,STUDENTANGKATAN) values ('jane.doe@student.umn.ac.id',13892,4,2,2018);
REM INSERTING into OT.USERDATA
SET DEFINE OFF;
Insert into OT.USERDATA (USERDATAEMAIL,USERDATAPASSWORD,USERDATAJOBID,USERDATAAUTHKEY,USERDATAID) values ('rully.saputra@student.umn.ac.id','halohalo',3,'halohalo',1);
Insert into OT.USERDATA (USERDATAEMAIL,USERDATAPASSWORD,USERDATAJOBID,USERDATAAUTHKEY,USERDATAID) values ('kevin.hendy@student.umn.ac.id','halohalo',3,'halohalo',2);
Insert into OT.USERDATA (USERDATAEMAIL,USERDATAPASSWORD,USERDATAJOBID,USERDATAAUTHKEY,USERDATAID) values ('john.doe@student.umn.ac.id','halohalo',3,'halohalo',3);
Insert into OT.USERDATA (USERDATAEMAIL,USERDATAPASSWORD,USERDATAJOBID,USERDATAAUTHKEY,USERDATAID) values ('jane.doe@student.umn.ac.id','halohalo',3,'halohalo',4);
Insert into OT.USERDATA (USERDATAEMAIL,USERDATAPASSWORD,USERDATAJOBID,USERDATAAUTHKEY,USERDATAID) values ('alethea@umn.ac.id','halohalo',2,'halohalo',5);
Insert into OT.USERDATA (USERDATAEMAIL,USERDATAPASSWORD,USERDATAJOBID,USERDATAAUTHKEY,USERDATAID) values ('andre.rusli@umn.ac.id','halohalo',2,'halohalo',6);
Insert into OT.USERDATA (USERDATAEMAIL,USERDATAPASSWORD,USERDATAJOBID,USERDATAAUTHKEY,USERDATAID) values ('darman@umn.ac.id','halohalo',4,'halohalo',7);
Insert into OT.USERDATA (USERDATAEMAIL,USERDATAPASSWORD,USERDATAJOBID,USERDATAAUTHKEY,USERDATAID) values ('widi@umn.ac.id','halohalo',5,'halohalo',8);
REM INSERTING into OT.USERJOB
SET DEFINE OFF;
Insert into OT.USERJOB (USERJOBID,USERJOBNAME) values (1,'Public');
Insert into OT.USERJOB (USERJOBID,USERJOBNAME) values (2,'Lecturer');
Insert into OT.USERJOB (USERJOBID,USERJOBNAME) values (3,'Student');
Insert into OT.USERJOB (USERJOBID,USERJOBNAME) values (4,'Staff');
Insert into OT.USERJOB (USERJOBID,USERJOBNAME) values (5,'Admin');