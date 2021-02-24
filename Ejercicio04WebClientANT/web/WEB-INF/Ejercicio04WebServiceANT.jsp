<%-- 
    Document   : Ejercicio04WebServiceANT
    Created on : 24-feb-2021, 10:34:39
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
	com.mycompany.ejercicio04webserver.Ejercicio04WebService_Service service = new com.mycompany.ejercicio04webserver.Ejercicio04WebService_Service();
	com.mycompany.ejercicio04webserver.Ejercicio04WebService port = service.getEjercicio04WebServicePort();
	 // TODO initialize WS operation arguments here
	java.lang.String libro1 = "";
	java.lang.String libro2 = "";
	java.lang.String libro3 = "";
	// TODO process result here
	java.lang.String result = port.tresLibros(libro1, libro2, libro3);
	out.println("Result = "+result);
    } catch (Exception ex) {
	// TODO handle custom exceptions here
    }
    %>
    <%-- end web service invocation --%><hr/>
    </body>
</html>
