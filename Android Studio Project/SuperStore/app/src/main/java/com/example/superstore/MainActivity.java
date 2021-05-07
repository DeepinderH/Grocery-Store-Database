package com.example.superstore;

import android.content.Intent;
import android.os.Bundle;

import androidx.appcompat.app.AppCompatActivity;

import android.view.View;

import android.view.Menu;
import android.view.MenuItem;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {

    private Button useAsCutomerButton;
    private Button useAsManagerButton;
    private Button useAsEmployeeButton;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        useAsCutomerButton = (Button) findViewById(R.id.useAsCustomer);
        useAsCutomerButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openCustomerPage();
            }
        });

        useAsEmployeeButton = (Button) findViewById(R.id.useAsEmployee);
        useAsEmployeeButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openEmployeePage();
            }
        });

        useAsManagerButton = (Button) findViewById(R.id.useAsManager);
        useAsManagerButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openManagerPage();
            }
        });
    }

    public void openCustomerPage(){
        Intent intent = new Intent(this, activity_customer.class);
        startActivity(intent);
    }

    public void openEmployeePage(){
        Intent intent2 = new Intent(this, activity_Employee.class);
        startActivity(intent2);
    }

    public void openManagerPage(){
        Intent intent3 = new Intent(this, activity_manager.class);
        startActivity(intent3);
    }
}