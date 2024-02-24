<%@ page import="java.io.BufferedReader, java.io.FileReader, java.io.IOException" %>

<%
    String ID = request.getParameter("ID");
    String Password = request.getParameter("password");
    String file = "C:\\Users\\Lenovo\\Desktop\\E-Learning (Mira)\\(12) First Semester 2023-2024\\Networks 2\\HWs\\HW2\\hello\\hello\\usersJSP.txt";

    try (BufferedReader reader = new BufferedReader(new FileReader(file))) {
        String line;
        while ((line = reader.readLine()) != null) {
            String[] cred = line.split(":");
            if (cred.length == 2 && cred[0].equals(ID) && cred[1].equals(Password)) {
                out.println("Permit");
                return;
            }
        }
    } catch (IOException e) {
        e.printStackTrace(); // Log the exception or handle it appropriately
    }
    out.println("Deny");
%>
