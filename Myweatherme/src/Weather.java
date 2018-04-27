
import java.math.BigDecimal;
import java.util.Date;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author ipd11
 */
public class Weather {
    long id;
    String city;
    BigDecimal temperature;
    Date readingDate;
    
    @Override
    public String toString() {
        return String.format("%d: in %s was %sC on %s", id, city, temperature, readingDate);
    }
}
