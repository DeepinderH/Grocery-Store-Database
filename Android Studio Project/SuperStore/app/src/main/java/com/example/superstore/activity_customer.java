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

public class activity_customer extends AppCompatActivity {
    private EditText editText;
    private Button nextPage;
    private String str;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_customer);

        editText = (EditText) findViewById(R.id.idInput);
        editText.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                editText.getText().clear();
                editText.setTextColor(0xff000000);
            }

        });

        nextPage = (Button) findViewById(R.id.nextCustomerPage);
        nextPage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNextCustomerPage();
            }
        });

    }

    public void deleteAccount(View view) {
        String ID = editText.getText().toString();
        String deleteLink = "http://192.168.1.73:80/SuperStore/API/Customer/Delete_Customer.php";
        backgroundDelete bg = new backgroundDelete(this);
        String flag = "false";
        bg.execute(ID, deleteLink, flag);
    }

    public void openNextCustomerPage(){
        Intent intent = new Intent(this, activity_customer_page2.class);
        startActivity(intent);
    }
}