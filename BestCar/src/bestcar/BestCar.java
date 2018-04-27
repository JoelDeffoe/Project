/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package bestcar;

import java.util.ArrayList;
import java.util.Collections;

/**
 *
 * @author ipd11
 */
public class BestCar {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
         ArrayList<Car> garage=new ArrayList();
        garage.add(new Car("toyota","matrix", 200,1.6,25));
        garage.add(new Car("toyota","Echo ", 180,2.5,12));
        garage.add(new Car("Bugatty","verone ", 360,0.2,26.5));
        garage.add(new Car("porche ","Aventador", 340,0.6,25));
        garage.add(new Car("Accura","RX6", 260,1.5,15));
        System.out.println(Car.getCount());
        garage.add(new Car("Bugatty","verone ", 360,0.2,26.5));
        garage.add(new Car("porche ","Aventador", 340,0.6,25));
        garage.add(new Car("Accura","RX6", 260,1.5,15));
        System.out.println(Car.getCount());
        
        System.out.println("original ");
        for (Car c: garage){
            System.out.println(c +",");
        }
        System.out.println("");
        Collections.sort(garage);
        System.out.println("storde alpha ");
        for (Car c: garage){
            System.out.println(c +",");
        }
         System.out.println("");
        Collections.sort(garage,Car.compByMaxSpeed);
        System.out.println("topSpeed ");
        for (Car c: garage){
            System.out.println(c +",");
        }
         System.out.println("");
        Collections.sort(garage,Car.compByAccel);
        System.out.println("acceleration ");
        for (Car c: garage){
            System.out.println(c +",");
        }
         System.out.println("");
        Collections.sort(garage,Car.compByEcono);
        System.out.println("econo ");
        for (Car c: garage){
            System.out.println(c +",");
        }
        System.out.println("");
    }
    }
    
