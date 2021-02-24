<%-- 
    Document   : Ejercicio01WebClientMAVEN
    Created on : 24-feb-2021, 9:37:19
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
        
        <%-- start web service invocation --%><hr/>
        <%
            try {
                com.mycompany.ejercicio01webserver.Ejercicio01WebService_Service service = new com.mycompany.ejercicio01webserver.Ejercicio01WebService_Service();
                com.mycompany.ejercicio01webserver.Ejercicio01WebService port = service.getEjercicio01WebServicePort();
                // TODO initialize WS operation arguments here
                int altura = 3;
                int base = 2;
                // TODO process result here
                java.lang.String result = port.areaTriangulo(altura, base);
                out.println("Result = " + result);
            } catch (Exception ex) {
                // TODO handle custom exceptions here
            }
        %>
        <%-- end web service invocation --%><hr/>
    </body>
</html>
