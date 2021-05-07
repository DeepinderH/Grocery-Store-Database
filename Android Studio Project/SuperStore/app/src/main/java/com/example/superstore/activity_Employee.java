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

    public class activity_Employee extends AppCompatActivity {
        private EditText EmployeeID;
        private Button nextPage;


        @Override
        protected void onCreate(Bundle savedInstanceState) {
            super.onCreate(savedInstanceState);
            setContentView(R.layout.activity__employee);

            EmployeeID = (EditText) findViewById(R.id.employeeIDInput);
            EmployeeID.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    EmployeeID.getText().clear();
                    EmployeeID.setTextColor(0xff000000);
                }
            });

            nextPage = (Button) findViewById(R.id.nextEmployeePage);
            nextPage.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    openNextPage();
                }
            });

        }

        public void openNextPage(){
            Intent intent = new Intent(this, activity_Employee_page2.class);
            startActivity(intent);
        }
        public void deleteEmployeeSchedule(View view) {
            String ID = EmployeeID.getText().toString();
            String deleteLink = "http://192.168.1.73:80/SuperStore/API/Employee/Delete_Employee_Schedule.php";
            backgroundDelete bg1 = new backgroundDelete(this);
            String flag = "true";
            bg1.execute(ID, deleteLink, flag);
        }

    }