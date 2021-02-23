/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.ejercicio7tema8server;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.time.LocalDate;
import java.util.ArrayList;
import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;

/**
 *
 * @author admin
 */
@WebService(serviceName = "loteria")
public class loteria {

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
    @WebMethod(operationName = "guardarLoteria")
    public String guardarLoteria(@WebParam(name = "numero") int numero) {

        //Un texto cualquiera guardado en una variable
        String loteria = numero + " " + LocalDate.now();
        try {
            //Crear un objeto File se encarga de crear o abrir acceso a un archivo que se especifica en su constructor
            File archivo = new File("C:\\Users\\admin\\Desktop\\ficheroLoteria\\loterias.txt");
            //Crear objeto FileWriter que sera el que nos ayude a escribir sobre archivo
            FileWriter escribir = new FileWriter(archivo, true);
            //Escribimos en el archivo con el metodo write 
            escribir.write(loteria);
            escribir.write("\n");
            //Cerramos la conexion
            escribir.close();
        } //Si existe un problema al escribir cae aqui
        catch (Exception e) {
            System.out.println("Error al escribir");
        }
        return loteria;
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "mostrarLoteria")
    public String mostrarLoteria() {

        File archivo = null;
        FileReader fr = null;
        BufferedReader br = null;
        String cadena="";
        try {
            // Apertura del fichero y creacion de BufferedReader para poder
            // hacer una lectura comoda (disponer del metodo readLine()).
            archivo = new File("C:\\Users\\admin\\Desktop\\ficheroLoteria\\loterias.txt");
            fr = new FileReader(archivo);
            br = new BufferedReader(fr);

            // Lectura del fichero
            String linea;
            while ((linea = br.readLine()) != null) {
                cadena+=linea.split(" ")[0]+"\n";
            }
        } catch (Exception e) {
            e.printStackTrace();
        } finally {
            // En el finally cerramos el fichero, para asegurarnos
            // que se cierra tanto si todo va bien como si salta 
            // una excepcion.
            try {
                if (null != fr) {
                    fr.close();
                }
            } catch (Exception e2) {
                e2.printStackTrace();
            }
            return cadena;
        }
    }
    
    @WebMethod(operationName = "mostrarLoteriaPorFecha")
    public String mostrarLoteriaPorFecha(@WebParam(name = "fecha") String fecha) {
        //TODO write your implementation code here:
        File archivo = null;
        FileReader fr = null;
        BufferedReader br = null;
        ArrayList<String> numeros = new ArrayList();
        ArrayList<String> fechas = new ArrayList();
        String numerosReturn = "";
        try {
            // Apertura del fichero y creacion de BufferedReader para poder
            // hacer una lectura comoda (disponer del metodo readLine()).
            archivo = new File("C:\\Users\\Juan\\Desktop\\fichero\\loterias.txt");
            fr = new FileReader(archivo);
            br = new BufferedReader(fr);

            // Lectura del fichero
            String linea;
            while ((linea = br.readLine()) != null) {
                numeros.add(linea.split(" ")[0]);
                fechas.add(linea.split(" ")[1]);
            }
            for (int i = 0; i < fechas.size(); i++) {
                if (fechas.get(i).equals(fecha)) {
                    numerosReturn = numerosReturn + numeros.get(i) + " ";
                }
            }
        } catch (Exception e) {
            e.printStackTrace();
        } finally {
            // En el finally cerramos el fichero, para asegurarnos
            // que se cierra tanto si todo va bien como si salta 
            // una excepcion.
            try {
                if (null != fr) {
                    fr.close();
                }
            } catch (Exception e2) {
                e2.printStackTrace();
            }
            return numerosReturn;
        }
    }
}
