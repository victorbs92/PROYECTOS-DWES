/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.mavenproject1;

import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;

/**
 *
 * @author victo
 */
@WebService(serviceName = "dni")
public class dni {

    /**
     * This is a sample web service operation
     */
    @WebMethod(operationName = "hello")
    public String hello(@WebParam(name = "name") String txt) {
        return "Hello " + txt + " !";
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "obtenerLetraDNI")
    public String obtenerLetraDNI(@WebParam(name = "numDNI") int numDNI) {
        int resto = numDNI % 23;
        char[] letras = {'T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'};
        return "DNI COMPLETO: " + numDNI + letras[resto];
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "comprobarDNI")
    public String comprobarDNI(@WebParam(name = "numDNI") int numDNI, @WebParam(name = "letraDNI") String letraDNI) {
        int resto = numDNI % 23;
        char[] letras = {'T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'};
        System.out.println(letraDNI);
        if (letraDNI.equals(Character.toString(letras[resto]))) {
            return "valido";
        } else {
            return "invalido";
        }
    }
}
