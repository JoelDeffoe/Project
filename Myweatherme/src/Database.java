

import java.math.BigDecimal;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author ipd11
 */
public class Database {
    
    public static final String DBUSER = "firstdb";
    public static final String DBPASS = "rZ48ka7dKzBAGdzL";
    
    private Connection conn;
    
      public Database() throws SQLException {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost/firstdb", DBUSER, DBPASS);
        } catch (ClassNotFoundException ex) {
            throw new SQLException("Driver class not found", ex);
        }
    }

    public void addWeather(Weather w) throws SQLException {
        String sql = "INSERT INTO weather (city, temperature, readingDate) VALUES (?, ?, ?)";
        try (PreparedStatement stmt = conn.prepareStatement(sql)) {
            stmt.setString(1, w.city);
            stmt.setBigDecimal(2, w.temperature);
            // convert java.util.Date to java.sql.Date by asking for time as long value
            stmt.setDate(3, new java.sql.Date(w.readingDate.getTime()));
            stmt.executeUpdate();
        }
    }

    public void updateWeather(Weather w) {
        throw new RuntimeException("Update record not implemented yet");
    }

    public void deleteWeather(long id) throws SQLException {
        String sql = "DELETE FROM weather WHERE ID=?";
        try (PreparedStatement stmt = conn.prepareStatement(sql)) {
            stmt.setLong(1, id);
            stmt.executeUpdate();
        }
    }

    public ArrayList<Weather> getAllWeather() throws SQLException {
        ArrayList<Weather> list = new ArrayList<>();
        String sql = "SELECT * FROM weather";
        try (Statement stmt = conn.createStatement(); ResultSet result = stmt.executeQuery(sql)) {
            while (result.next()) {
                Weather w = new Weather();
                w.id = result.getLong("ID");
                w.city = result.getString("city");
                w.temperature = result.getBigDecimal("temperature");
                w.readingDate = result.getDate("readingDat");
                list.add(w);
            }
        }
        return list;
    }

    public Weather getWeatherById(long id) {
        throw new RuntimeException("Fetch one record not implemented yet");
    }

}

