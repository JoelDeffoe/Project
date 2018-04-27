package com.example.deffjump.extrawork;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.method.ScrollingMovementMethod;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;

import java.util.ArrayList;

public class rating extends AppCompatActivity implements View.OnClickListener {

        RadioGroup group;
        RadioButton all;
        RadioButton tow;
        RadioButton tree;
        ImageButton back;
        TextView fnlr;
        TextView avg;
        EditText name;

        String finalResultLable="";
        ArrayList<MainActivity.RatingResult> resultSet1;

@Override
protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_rating);
        initiale();
        Intent intent = getIntent();
        Bundle bundle = intent.getBundleExtra("bundleKey");
        resultSet1 = (ArrayList<MainActivity.RatingResult>) bundle.getSerializable("serializableObjectKey");
        String finalRezult = makeResult(resultSet1);
        fnlr.setText(finalRezult);

        }

private void initiale() {

        fnlr = findViewById(R.id.result);
        fnlr.setMovementMethod(new ScrollingMovementMethod());

        back = findViewById(R.id.back);
        back.setOnClickListener(this);

        name=findViewById(R.id.editText);

        avg=findViewById(R.id.avg);

        group=findViewById(R.id.group);

        all=findViewById(R.id.All);

        tow=findViewById(R.id.Wrong);

        tree=findViewById(R.id.Right);
        }

public String makeResult(ArrayList<MainActivity.RatingResult> resultSet1) {
        for (MainActivity.RatingResult object : resultSet1) {

        finalResultLable += "Cutomer Order :"+ object.order  + ", Rating : " + object.rate +"\n" ;

        }
        return finalResultLable;
        }

@Override
public void onClick(View view) {
        String user=name.getText().toString();
        String setResult="Thank you :" +user;
        Intent intent = new Intent();
        intent.putExtra("Result_ok",setResult);
        setResult(RESULT_OK,intent);
        finish();

        }
public void stras(View view) {
        finalResultLable="";
        clear();
        for (MainActivity.RatingResult object : resultSet1) {
        if (object.rate==1) {
        finalResultLable += "Cutomer Order :"+ object.order  + ", Rating : " + object.rate +"\n" ;
        }
        }

        fnlr.setText(finalResultLable);

        }

public void stras1(View view) {
        clear();
        finalResultLable="";

        for (MainActivity.RatingResult object : resultSet1) {
        if (object.rate==2) {
        finalResultLable += "Cutomer Order :"+ object.order  + ", Rating : " + object.rate +"\n" ;
        }
        }

        fnlr.setText(finalResultLable);
        }

public void clear(){
        fnlr.setText("");

        }
public void stras2(View view) {

        finalResultLable="";
        clear();
        for (MainActivity.RatingResult object : resultSet1) {
        if (object.rate==3) {
        finalResultLable += "Cutomer Order :"+ object.order  + ", Rating : " + object.rate +"\n" ;
        }
        }

        fnlr.setText(finalResultLable);
        }
}
