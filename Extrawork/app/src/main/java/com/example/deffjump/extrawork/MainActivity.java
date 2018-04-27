package com.example.deffjump.extrawork;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.RatingBar;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.Collections;

public class MainActivity extends AppCompatActivity implements View.OnClickListener,AdapterView.OnItemSelectedListener {

        Spinner spinner;
        ImageView imageView;
        RatingBar ratingBar;
        Button btnAdd,btnShowAll,btnMeal,btnSalad;
        TextView textView;

        String listMeal[]={"Salmon","Poutine","Sushi","Tacos"};
        int mealPicture[]={R.drawable.untitled1,R.drawable.untitled,R.drawable.poutine,R.drawable.images};

        String listSalad[]={"Chiken salad" ," Montreal" ," Green Salad"};
        int saladPicture[]={R.drawable.salad_a,R.drawable.salad_b,R.drawable.salad_c};

        ArrayAdapter<String> mealAdapter;

        ArrayAdapter<String> saladAdapter;

        int flag;

public static class RatingResult implements java.io.Serializable {

    int rate;
    String order;
}
    ArrayList<RatingResult> resultSet=new ArrayList<>();
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        initialize();
    }

    private void initialize() {


        ratingBar=findViewById(R.id.ratingBar);

        imageView=findViewById(R.id.imageView);

        btnAdd=findViewById(R.id.btnAdd);
        btnAdd.setOnClickListener(this);

        btnShowAll=findViewById(R.id.btnShowAll);
        btnShowAll.setOnClickListener(this);

        btnMeal=findViewById(R.id.btnMeal);
        btnMeal.setOnClickListener(this);

        btnSalad=findViewById(R.id.btnSalad);
        btnSalad.setOnClickListener(this);

        textView=findViewById(R.id.textView);

        spinner=findViewById(R.id.spinnerMeal);
        spinner.setOnItemSelectedListener(this);

        mealAdapter=new ArrayAdapter<>( this,R.layout.support_simple_spinner_dropdown_item,listMeal);
        saladAdapter=new ArrayAdapter<>( this,R.layout.support_simple_spinner_dropdown_item,listSalad);

        spinner.setAdapter( mealAdapter);
    }

    @Override
    public void onClick(View view) {

        switch (view.getId()){

            case R.id.btnAdd:{
                if(flag==1) {
                    addMealRating();
                }
                else
                    addSladRating();
            }
            break;
            case R.id.btnShowAll: {
                ShowAllRating();
            }
            break;
            case R.id.btnMeal:{
                spinner.setAdapter( mealAdapter);
                flag=1;
            }
            break;
            case R.id.btnSalad:{
                spinner.setAdapter( saladAdapter);
                flag=2;
            }
            break;
        }
    }

    private void addSladRating() {

        int rating=(int)ratingBar.getRating();

        String salad=spinner.getSelectedItem().toString();
        RatingResult ratingResult=new RatingResult();
        ratingResult.order=salad;
        if(rating==0.5 && rating==0)
            rating=1;
        else if(rating==1.5)
            rating=1;
        else if(rating==2.5)
            rating=2;
        ratingResult.rate=rating;
        resultSet.add(ratingResult);
        ratingBar.setRating(0);
    }
    @Override
    protected void onActivityResult(int requestCode,int resultCode,Intent data){
        super.onActivityResult(requestCode,resultCode,data);

        if(requestCode==1){
            String reciveData=(String)data.getExtras().getSerializable("Result_ok");
            System.out.println(reciveData);
            if(resultCode==RESULT_OK)
                textView.setText(reciveData);
            else
                textView.setText("Canceled");

        }


    }
    private void ShowAllRating() {
        Bundle bundle=new Bundle();
        bundle.putSerializable("serializableObjectKey", resultSet);
        Intent intent = new Intent(this, rating.class);
        intent.putExtra("bundleKey", bundle);
        startActivityForResult(intent,1);

    }

    private void addMealRating() {
        int rating=(int)ratingBar.getRating();
        if(rating==0.5 && rating==0)
            rating=1;
        else if(rating==1.5)
            rating=1;
        else if(rating==2.5)
            rating=2;
        String meal=spinner.getSelectedItem().toString();
        RatingResult ratingResult=new RatingResult();
        ratingResult.order=meal;
        ratingResult.rate=rating;
        resultSet.add(ratingResult);
        ratingBar.setRating(0);
    }

    @Override
    public void onItemSelected(AdapterView<?> adapterView, View view, int i, long l) {
        if(flag==1) {
            int image = mealPicture[i];
            imageView.setImageResource(image);
        }else
        {
            int image = saladPicture[i];
            imageView.setImageResource(image);
        }

    }

    @Override
    public void onNothingSelected(AdapterView<?> adapterView) {

    }
}
