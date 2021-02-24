<%-- 
    Document   : Ejercicio02WebServiceANT
    Created on : 24-feb-2021, 10:02:06
    Author     : admin
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Hello World!</h1>
        
    <%-- start web service invocation --%><hr/>
    <%
    try {
	com.mycompany.ejercicio02webserver.Ejercicio02WebService_Service service = new com.mycompany.ejercicio02webserver.Ejercicio02WebService_Service();
	com.mycompany.ejercicio02webserver.Ejercicio02WebService port = service.getEjercicio02WebServicePort();
	 // TODO initialize WS operation arguments here
	java.lang.String palabra1 = "";
	java.lang.String palabra2 = "";
	// TODO process result here
	java.lang.String result = port.dosPalabras(palabra1, palabra2);
	out.println("Result = "+result);
    } catch (Exception ex) {
	// TODO handle custom exceptions here
    }
    %>
    <%-- end web service invocation --%><hr/>
    </body>
</html>
