/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package firstdb;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Scanner;


    //rZ48ka7dKzBAGdzL

public class FirstDb {

    public static final String DBUSER="firstdb";
    public static final String DBPASS="rZ48ka7dKzBAGdzL";
        
  
    public static void main(String[] args) throws SQLException {
        Scanner input = new Scanner(System.in);

        Connection conn = DriverManager.getConnection("jdbc:mysql://localhost/firstdb", DBUSER, DBPASS);

        if (false) {
            // ask for data to insert
            System.out.print("Enter name of city: ");
            String city = input.nextLine();
            System.out.print("Enter temperature: ");
            String temp = input.nextLine();
            System.out.print("Enter date in YYYY-MM-DD format: ");
            String date = input.nextLine();

            // do the insert
            String sql = "INSERT INTO weather (city, temperature, readingDate) VALUES (?, ?, ?)";
            try (PreparedStatement stmt = conn.prepareStatement(sql)) {
                stmt.setString(1, city);
                stmt.setString(2, temp);
                stmt.setString(3, date);
                stmt.executeUpdate();
            }
        }
        // TASK: execute SELECT of all records and display the date one record per line
        {
            String sql = "SELECT * FROM weather";
            try (Statement stmt = conn.createStatement(); ResultSet result = stmt.executeQuery(sql)) {                
                while (result.next()) {
                    int id = result.getInt("ID");
                    String city = result.getString("city");
                    String temperature = result.getString("temperature");
                    String readingDate = result.getString("readingDat");
                    System.out.printf("%d: %s had %sC on %s\n", id, city, temperature, readingDate);
                }
           }
        }
    }
}

