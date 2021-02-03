/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.tema08;

import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;

/**
 *
 * @author admin
 */
@WebService(serviceName = "Ejercicio03")
public class Ejercicio03 {

    /**
     * Web service operation
     */
    @WebMethod(operationName = "cotizacion")
    public String cotizacion(@WebParam(name = "moneda") String moneda) {
        switch (moneda) {
            case "EU": {
                return Double.toString(1.3660);
            }
            case "DO": {
                return Double.toString(0.7320);
            }
            default: {
                return "ERROR";
            }
        }

    }
}
