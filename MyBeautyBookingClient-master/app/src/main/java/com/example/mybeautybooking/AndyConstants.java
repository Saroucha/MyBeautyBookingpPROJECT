package com.example.mybeautybooking;

public class AndyConstants {
    // web service url constants
    public class ServiceType {
        public static final String BASE_URL = "http://10.192.128.139/ProjetClient2/MyBeautyBookingServer-master/";
        public static final String LOGIN = BASE_URL + "Authentification.php";
        public static final String REGISTER =  BASE_URL + "EnregistrementPro.php";
        public static final String IMAGE =  BASE_URL + "getImage.php";
   }
    // webservice key constants
    public class Params {
        public static final String NAME = "NomP";
        public static final String Email = "Email";
        public static final String adresseDomicile="Adresse";
        public static final String postale="Postale";
        public static final String distance="Distance";
        public static final String nomEntreprise="NomEntreprise";
        public static final String registre="Registre";
        public static final String description="Description";
        public static final String telephone="Telephone";
        public static final String  ImagePath = "upload/";
        public static final String Image="image_path";
        //public static final String USERNAME = "username";
        public static final String PASSWORD = "Password";
       }
}

