package com.example.superstore;

import android.graphics.Color;
import android.os.Bundle;

import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class activity_manager extends AppCompatActivity {
    private EditText companyIDEdit;
    private EditText companyNameEdit;
    private Button button;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_manager);

        companyIDEdit = (EditText) findViewById(R.id.companyID);
        companyIDEdit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                companyIDEdit.getText().clear();
                companyIDEdit.setTextColor(0xff000000);
            }

        });
        companyNameEdit = (EditText) findViewById(R.id.companyName);
        companyNameEdit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                companyNameEdit.getText().clear();
                companyNameEdit.setTextColor(0xff000000);
            }

        });

    }

    public void addAccountant(View view) {
        String companyIDStr = companyIDEdit.getText().toString();
        String companyNameStr = companyNameEdit.getText().toString();
        String addAttendant = "http://192.168.1.73:80/SuperStore/API/Manager/Add_Accountant.php";
        background bg = new background(this);
        bg.execute(companyIDStr, companyNameStr, addAttendant);
    }

    public void addLogistics(View view) {
        String companyIDStr = companyIDEdit.getText().toString();
        String companyNameStr = companyNameEdit.getText().toString();
        String addAttendant = "http://192.168.1.73:80/SuperStore/API/Manager/Add_Logistics.php";
        background bg2 = new background(this);
        bg2.execute(companyIDStr, companyNameStr, addAttendant);
    }

    public void cleaningCompany(View view) {
        String companyIDStr = companyIDEdit.getText().toString();
        String companyNameStr = companyNameEdit.getText().toString();
        String addAttendant = "http://192.168.1.73:80/SuperStore/API/Manager/Add_Cleaning_Company.php";
        background bg3 = new background(this);
        bg3.execute(companyIDStr, companyNameStr, addAttendant);
    }

    public void EditAccountant(View view) {
        String companyIDStr = companyIDEdit.getText().toString();
        String companyNameStr = companyNameEdit.getText().toString();
        String addAttendant = "http://192.168.1.73:80/SuperStore/API/Manager/Edit_Accountant.php";
        background bg4 = new background(this);
        bg4.execute(companyIDStr, companyNameStr, addAttendant);
    }

    public void editLogistics(View view) {
        String companyIDStr = companyIDEdit.getText().toString();
        String companyNameStr = companyNameEdit.getText().toString();
        String addAttendant = "http://192.168.1.73:80/SuperStore/API/Manager/Edit_Logistics.php";
        background bg4 = new background(this);
        bg4.execute(companyIDStr, companyNameStr, addAttendant);
    }

    public void editCleaningCompany(View view) {
        String companyIDStr = companyIDEdit.getText().toString();
        String companyNameStr = companyNameEdit.getText().toString();
        String addAttendant = "http://192.168.1.73:80/SuperStore/API/Manager/Edit_Cleaning_Company.php";
        background bg4 = new background(this);
        bg4.execute(companyIDStr, companyNameStr, addAttendant);
    }

    public void getAllCustomers(View view) {
        String deleteLink = "http://192.168.1.73:80/SuperStore/API/Customer/All_Customers.php";
        backgroundGet bg5 = new backgroundGet(this);
        bg5.execute(deleteLink);
    }

    public void getAllEmployees(View view) {
        String deleteLink = "http://192.168.1.73:80/SuperStore/API/Employee/Employees.php";
        backgroundGet bg6 = new backgroundGet(this);
        bg6.execute(deleteLink);
    }

    public void getAllEmployeesSchedule(View view) {
        String deleteLink = "http://192.168.1.73:80/SuperStore/API/Employee/Employees_Schedule.php";
        backgroundGet bg7 = new backgroundGet(this);
        bg7.execute(deleteLink);
    }
}