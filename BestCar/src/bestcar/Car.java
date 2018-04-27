/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package bestcar;

import java.util.Comparator;

/**
 *
 * @author ipd11
 */
public class Car implements Comparable<Car> {

    private static int counter;
    int uniqueId;

    public static int getCount() {
        return counter;
    }

    public int getUnique() {
        return uniqueId;
    }

    String make; // e.g. BMW, Toyota, etc.     
    String model; // e.g. X5, Corolla, etc.
    int maxSpeedKmph; // maximum speed in km/h
    double secTo100Kmph; // accelleration time 1-100 km/h in seconds
    double litersPer100km; // economy: liters of gas per 100 km

    public Car(String make, String model, int maxSpeedKmph, double secTo100Kmph, double litersPer100km) {
        counter++;
        uniqueId = counter;
        this.make = make;
        this.model = model;
        this.maxSpeedKmph = maxSpeedKmph;
        this.secTo100Kmph = secTo100Kmph;
        this.litersPer100km = litersPer100km;

    }

    @Override
    public String toString() {
        return String.format("%s : %s  maxspeed: %s  0 to 100 in %s sec  %s 100km", make, model, maxSpeedKmph, secTo100Kmph, litersPer100km);
    }

    @Override
    public int compareTo(Car o) {
        int res = make.toLowerCase().compareTo(o.make.toLowerCase());
        if (res != 0) {
            return res;
        }
        return model.toLowerCase().compareTo(o.model.toLowerCase());
    }
    static Comparator<Car> compByMaxSpeed = new Comparator<Car>() {
        @Override
        public int compare(Car o1, Car o2) {
            return o1.maxSpeedKmph - o2.maxSpeedKmph;
        }

    };
    static Comparator<Car> compByAccel = new Comparator<Car>() {
        @Override
        public int compare(Car o1, Car o2) {
            if (o2.secTo100Kmph == o1.secTo100Kmph) {
                return 0;
            }
            if (o2.secTo100Kmph < o1.secTo100Kmph) {
                return 1;
            } else {
                return -1;
            }
        }
    };
    static Comparator<Car> compByEcono = new Comparator<Car>() {
        @Override
        public int compare(Car o1, Car o2) {
            return (int) (o1.litersPer100km - o2.litersPer100km);
        }

    };

}
