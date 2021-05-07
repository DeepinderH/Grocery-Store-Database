package com.example.superstore;

import android.content.Intent;
import android.os.Bundle;

import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class activity_Employee_page2 extends AppCompatActivity {
    private EditText storeID;
    private EditText productID;
    private EditText quantity;
    private Button addInventoryBtn;
    private Button editInventoryBtn;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity__employee_page2);

        storeID = (EditText) findViewById(R.id.storeID);
        storeID.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                storeID.getText().clear();
                storeID.setTextColor(0xff000000);
            }

        });

        productID = (EditText) findViewById(R.id.productID);
        productID.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                productID.getText().clear();
                productID.setTextColor(0xff000000);
            }

        });

        quantity = (EditText) findViewById(R.id.quantity);
        quantity.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                quantity.getText().clear();
                quantity.setTextColor(0xff000000);
            }

        });

    }

    public void openNextPage(){
        Intent intent = new Intent(this, activity_Employee_page2.class);
        startActivity(intent);
    }
    public void addInventory(View view) {
        String storeIDStr = storeID.getText().toString();
        String productIDStr = productID.getText().toString();
        String quantityStr = quantity.getText().toString();
        String deleteLink = "http://192.168.1.73:80/SuperStore/API/Employee/Add_Inventory.php";
        backgroundInventory bg1 = new backgroundInventory(this);

        bg1.execute(storeIDStr, productIDStr, quantityStr, deleteLink );
    }

    public void editInventory(View view) {
        String storeIDStr = storeID.getText().toString();
        String productIDStr = productID.getText().toString();
        String quantityStr = quantity.getText().toString();
        String deleteLink = "http://192.168.1.73:80/SuperStore/API/Employee/Update_Inventory.php";
        backgroundInventory bg2 = new backgroundInventory(this);
        bg2.execute(storeIDStr, productIDStr, quantityStr, deleteLink );
    }

}