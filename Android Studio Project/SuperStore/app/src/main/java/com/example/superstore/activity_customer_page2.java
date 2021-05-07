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
import android.content.Intent;
import android.os.Bundle;
import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class activity_customer_page2 extends AppCompatActivity {
    private EditText user_ID;
    private EditText first_name;
    private EditText last_name;
    private EditText sex;
    private EditText postal_code;
    private EditText city;
    private EditText province;
    private EditText street_name;
    private EditText email;
    private EditText date_of_birth;
    private EditText store_id;
    private EditText points;
    private EditText memberNumber;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_customer_page2);

        user_ID = (EditText) findViewById(R.id.userID);
        user_ID.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                user_ID.getText().clear();
                user_ID.setTextColor(0xff000000);
            }

        });

        first_name = (EditText) findViewById(R.id.first_name);
        first_name.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                first_name.getText().clear();
                first_name.setTextColor(0xff000000);
            }

        });

        last_name = (EditText) findViewById(R.id.last_name);
        last_name.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                last_name.getText().clear();
                last_name.setTextColor(0xff000000);
            }

        });

        first_name = (EditText) findViewById(R.id.first_name);
        first_name.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                first_name.getText().clear();
                first_name.setTextColor(0xff000000);
            }

        });

        sex = (EditText) findViewById(R.id.sex);
        sex.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                sex.getText().clear();
                sex.setTextColor(0xff000000);
            }

        });

        postal_code = (EditText) findViewById(R.id.postal_code);
        postal_code.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                postal_code.getText().clear();
                postal_code.setTextColor(0xff000000);
            }

        });

        city = (EditText) findViewById(R.id.city);
        city.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                city.getText().clear();
                city.setTextColor(0xff000000);
            }

        });

        province = (EditText) findViewById(R.id.province);
        province.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                province.getText().clear();
                province.setTextColor(0xff000000);
            }

        });

        street_name = (EditText) findViewById(R.id.street_name);
        street_name.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                street_name.getText().clear();
                street_name.setTextColor(0xff000000);
            }

        });

        email = (EditText) findViewById(R.id.email);
        email.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                email.getText().clear();
                email.setTextColor(0xff000000);
            }

        });
        date_of_birth = (EditText) findViewById(R.id.date_of_birth);
        date_of_birth.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                date_of_birth.getText().clear();
                date_of_birth.setTextColor(0xff000000);
            }

        });
        store_id = (EditText) findViewById(R.id.store_id);
        store_id.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                store_id.getText().clear();
                store_id.setTextColor(0xff000000);
            }

        });
        points = (EditText) findViewById(R.id.customerPoints);
        points.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                points.getText().clear();
                points.setTextColor(0xff000000);
            }

        });

        memberNumber = (EditText) findViewById(R.id.customerMember);
        memberNumber.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                memberNumber.getText().clear();
                memberNumber.setTextColor(0xff000000);
            }

        });

    }

    public void addCustomerAccount(View view) {
        String userIDStr = user_ID.getText().toString();
        String first_nameStr = first_name.getText().toString();
        String last_nameStr = last_name.getText().toString();
        String sexStr = sex.getText().toString();
        String postal_codeStr = postal_code.getText().toString();
        String cityStr = city.getText().toString();
        String provinceStr = province.getText().toString();
        String street_nameStr = street_name.getText().toString();
        String emailStr = email.getText().toString();
        String date_of_birthStr = date_of_birth.getText().toString();
        String store_idStr = store_id.getText().toString();
        String pointsStr = points.getText().toString();
        String memberNumberStr = memberNumber.getText().toString();

        String deleteLink = "http://192.168.1.73:80/SuperStore/API/Customer/Add_Customer.php";
        backgroundCustomer bg1 = new backgroundCustomer(this);

        bg1.execute(userIDStr, first_nameStr, last_nameStr,sexStr,postal_codeStr,cityStr,provinceStr,
                street_nameStr,emailStr,date_of_birthStr,store_idStr,pointsStr,memberNumberStr,deleteLink );
    }

    public void addCustomerAccountPoints(View view) {
        String userIDStr = user_ID.getText().toString();
        String first_nameStr = first_name.getText().toString();
        String last_nameStr = last_name.getText().toString();
        String sexStr = sex.getText().toString();
        String postal_codeStr = postal_code.getText().toString();
        String cityStr = city.getText().toString();
        String provinceStr = province.getText().toString();
        String street_nameStr = street_name.getText().toString();
        String emailStr = email.getText().toString();
        String date_of_birthStr = date_of_birth.getText().toString();
        String store_idStr = store_id.getText().toString();
        String pointsStr = points.getText().toString();
        String memberNumberStr = memberNumber.getText().toString();
        String deleteLink = "http://192.168.1.73:80/SuperStore/API/Customer/Add_Customer.php";
        backgroundCustomer bg2 = new backgroundCustomer(this);
        bg2.execute(userIDStr, first_nameStr, last_nameStr,sexStr,postal_codeStr,cityStr,provinceStr,
                street_nameStr,emailStr,date_of_birthStr,store_idStr,pointsStr,memberNumberStr,deleteLink );
    }

    public void editCustomerAccount(View view) {
        String userIDStr = user_ID.getText().toString();
        String first_nameStr = first_name.getText().toString();
        String last_nameStr = last_name.getText().toString();
        String sexStr = sex.getText().toString();
        String postal_codeStr = postal_code.getText().toString();
        String cityStr = city.getText().toString();
        String provinceStr = province.getText().toString();
        String street_nameStr = street_name.getText().toString();
        String emailStr = email.getText().toString();
        String date_of_birthStr = date_of_birth.getText().toString();
        String store_idStr = store_id.getText().toString();
        String pointsStr = points.getText().toString();
        String memberNumberStr = memberNumber.getText().toString();
        String deleteLink = "http://192.168.1.73:80/SuperStore/API/Customer/Edit_Customer.php";
        backgroundCustomer bg3 = new backgroundCustomer(this);
        bg3.execute(userIDStr, first_nameStr, last_nameStr,sexStr,postal_codeStr,cityStr,provinceStr
                ,street_nameStr,emailStr,date_of_birthStr,store_idStr,pointsStr,memberNumberStr,deleteLink );
    }

}