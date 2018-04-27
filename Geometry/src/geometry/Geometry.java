package geometry;

import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.InputMismatchException;
import java.util.Scanner;

class InvalidArgumentException extends Exception {

    InvalidArgumentException(String message) {
        super(message);
    }
}

abstract class GeoObj {
    
    GeoObj(String color) throws InvalidArgumentException {
        setColor(color);
    }
    private String color;

    public String getColor() {
        return color;
    }

    public final void setColor(String color) throws InvalidArgumentException {
        if (color == null || color.length() < 1) {
            throw new InvalidArgumentException("Color must not be empty");
        }
        this.color = color;
    }

    abstract public double getSurface();
    abstract public double getCircumPerim();
    abstract public double getVerticesCount();
    abstract public double getEdgesCount();
    abstract public void print();
}

class Rectangle extends GeoObj {

    Rectangle(String color, double width, double height) throws InvalidArgumentException {
        super(color);
        if (width < 0 || height < 0) {
            throw new InvalidArgumentException("Width and height must non-negative");
        }
        this.width = width;
        this.height = height;
    }
    private double width, height;

    @Override
    public double getSurface() {
        return width * height;
    }

    @Override
    public double getCircumPerim() {
        return 2 * width + 2 * height;
    }

    @Override
    public double getVerticesCount() {
        return 4;
    }

    @Override
    public double getEdgesCount() {
        return 4;
    }

    @Override
    public void print() {
        System.out.printf("Rectangle color %s", getColor());
    }
}

class Square extends Rectangle {

    Square(String color, double edgeLen) throws InvalidArgumentException {
        super(color, edgeLen, edgeLen);
    }

    @Override
    public void print() {
        System.out.printf("Square color %s", getColor());
    }
}

class Circle extends GeoObj {

    Circle(String color, double radius) throws InvalidArgumentException {
        super(color);
        if (radius < 0) {
            throw new InvalidArgumentException("Radius must non-negative");
        }
        this.radius = radius;
    }
    private double radius;

    @Override
    public double getSurface() {
        return Math.PI * radius * radius;
    }

    @Override
    public double getCircumPerim() {
        return 2 * Math.PI * radius;
    }

    @Override
    public double getVerticesCount() {
        return 0;
    }

    @Override
    public double getEdgesCount() {
        return 0;
    }

    @Override
    public void print() {
        System.out.printf("Circle color %s", getColor());
    }

}

class Sphere extends GeoObj {

    Sphere(String color, double radius) throws InvalidArgumentException {
        super(color);
        if (radius < 0) {
            throw new InvalidArgumentException("Radius must non-negative");
        }
        this.radius = radius;
    }
    private double radius;

    @Override
    public double getSurface() {
        return 4 * Math.PI * radius * radius;
    }

    @Override
    public double getCircumPerim() {
        return 2 * Math.PI * radius;
    }

    @Override
    public double getVerticesCount() {
        return 0;
    }

    @Override
    public double getEdgesCount() {
        return 0;
    }

    @Override
    public void print() {
        System.out.printf("Sphere color %s", getColor());
    }

}

class Point extends GeoObj {

    Point(String color) throws InvalidArgumentException {
        super(color);
    }
    private double width, height;

    @Override
    public double getSurface() {
        return 0;
    }

    @Override
    public double getCircumPerim() {
        return 0;
    }

    @Override
    public double getVerticesCount() {
        return 1;
    }

    @Override
    public double getEdgesCount() {
        return 0;
    }

    @Override
    public void print() {
        System.out.printf("Point color %s", getColor());
    }
}

public class Geometry {

    static ArrayList<GeoObj> geoList = new ArrayList<>();

    static final String FILE_NAME = "input.txt";

    public static void main(String[] args) {
        // 1. Parse input.txt file and add to geoList
        try {
            Scanner fileInput = new Scanner(new File(FILE_NAME));
            while (fileInput.hasNextLine()) {
                try {
                    String line = fileInput.nextLine();
                    System.out.println("Processing line: " + line);
                    
                    String[] data = line.split(";");
                    // 
                    if (data.length < 2) {
                        // version 1: continue
//                        System.out.println("Warning: Invalid number of data in line " + line);
//                        continue;
                        // version 2: throw exception to be caught within the loop
                        throw new InvalidArgumentException("Warning: Invalid number of data in line " + line);
                    }
                    String color = data[1];

                    switch (data[0]) {
                        case "Rectangle": {
                            if (data.length != 4) {
                                System.out.println("Warning: Invalid number of data in line " + line);
                                continue;
                            }
                            // parse error here must NOT exit the loop
                            // but continue to the next line
                            double width = Double.parseDouble(data[2]);
                            double height = Double.parseDouble(data[3]);
                            geoList.add(new Rectangle(color, width, height));
                        }
                        break;
                        case "Square": {
                            if (data.length != 3) {
                                System.out.println("Warning: Invalid number of data in line " + line);
                                continue;
                            }
                            // parse error here must NOT exit the loop
                            // but continue to the next line
                            double edge = Double.parseDouble(data[2]);
                            geoList.add(new Square(color, edge));
                        }
                        break;
                        case "Circle": {
                            if (data.length != 3) {
                                System.out.println("Warning: Invalid number of data in line " + line);
                                continue;
                            }
                            // parse error here must NOT exit the loop
                            // but continue to the next line
                            double radius = Double.parseDouble(data[2]);
                            geoList.add(new Circle(color, radius));
                        }
                        break;
                        case "Sphere": {
                            if (data.length != 3) {
                                System.out.println("Warning: Invalid number of data in line " + line);
                                continue;
                            }
                            // parse error here must NOT exit the loop
                            // but continue to the next line
                            double radius = Double.parseDouble(data[2]);
                            geoList.add(new Sphere(color, radius));
                        }
                        break;
                        case "Point": {
                            if (data.length != 2) {
                                System.out.println("Warning: Invalid number of data in line " + line);
                                continue;
                            }
                            geoList.add(new Point(color));
                        }
                        break;
                        default:
                            System.out.println("Warning: invalid data in line " + line);
                    }
                } catch (NumberFormatException | InvalidArgumentException e) {
                    System.out.println("Warning: invalid data " + e.getMessage());
                    // continue; // unnecessary in this case
                }
            } // loop end
            fileInput.close();
        } catch (IOException e) {
            System.err.println("Error reading file");
        } catch (InputMismatchException e) {
            System.err.println("Error: file contents mismatch");
        }

        // 2. print them out
        System.out.println("===================");
        for (GeoObj g : geoList) {
            g.print();
            System.out.println();
        }

    }

}