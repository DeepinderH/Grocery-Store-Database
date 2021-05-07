package com.example.superstore;

import android.app.AlertDialog;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.ProtocolException;
import java.net.URL;
import java.net.URLEncoder;
import android.app.AlertDialog;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.util.Log;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.ProtocolException;
import java.net.URL;
import java.net.URLEncoder;

public class backgroundCustomer extends AsyncTask<String, Void, String> {
    AlertDialog dialog;
    Context context;
    public Boolean login = false;

    public backgroundCustomer(Context context)
    {
        this.context = context;
    }
    @Override
    protected void onPreExecute() {
        dialog = new AlertDialog.Builder(context).create();
        dialog.setTitle("Message: ");
    }
    @Override
    protected void onPostExecute(String result) {
        dialog.setMessage(result);
        dialog.show();
//        if(result.contains("login successful"))
//        {
//            Intent intent_name = new Intent();
//            intent_name.setClass(context.getApplicationContext(), activity_manager.class);
//            context.startActivity(intent_name);
//        }
    }
    @Override
    protected String doInBackground(String... voids) {
        String result = "";
        try {

            String userIDStr = voids[0];
            String first_nameStr = voids[1];
            String last_nameStr = voids[2];
            String sexStr = voids[3];
            String postal_codeStr = voids[4];
            String cityStr = voids[5];
            String provinceStr = voids[6];
            String street_nameStr = voids[7];
            String emailStr = voids[8];
            String date_of_birthStr = voids[9];
            String store_idStr = voids[10];
            String pointsStr = voids[11];
            String memberNumberStr = voids[12];
            String httpIP = voids[13];

            URL url = new URL(httpIP);
            HttpURLConnection http = (HttpURLConnection) url.openConnection();
            http.setRequestMethod("POST");
            http.setDoInput(true);
            http.setDoOutput(true);
            OutputStream ops = http.getOutputStream();
            BufferedWriter writer = new BufferedWriter(new OutputStreamWriter(ops,"UTF-8"));
            String data = URLEncoder.encode("ID","UTF-8")+"="+URLEncoder.encode(userIDStr,"UTF-8")+"&&"
                    +URLEncoder.encode("first_name","UTF-8")+"="+URLEncoder.encode(first_nameStr,"UTF-8")+"&&"
                    +URLEncoder.encode("last_name","UTF-8")+"="+URLEncoder.encode(last_nameStr,"UTF-8")+"&&"
                    +URLEncoder.encode("sex","UTF-8")+"="+URLEncoder.encode(sexStr,"UTF-8")+"&&"
                    +URLEncoder.encode("postal_code","UTF-8")+"="+URLEncoder.encode(postal_codeStr,"UTF-8")+"&&"
                    +URLEncoder.encode("city","UTF-8")+"="+URLEncoder.encode(cityStr,"UTF-8")+"&&"
                    +URLEncoder.encode("province","UTF-8")+"="+URLEncoder.encode(provinceStr,"UTF-8")+"&&"
                    +URLEncoder.encode("street_name","UTF-8")+"="+URLEncoder.encode(street_nameStr,"UTF-8")+"&&"
                    +URLEncoder.encode("email","UTF-8")+"="+URLEncoder.encode(emailStr,"UTF-8")+"&&"
                    +URLEncoder.encode("date_of_birth","UTF-8")+"="+URLEncoder.encode(date_of_birthStr,"UTF-8")+"&&"
                    +URLEncoder.encode("store_id","UTF-8")+"="+URLEncoder.encode(store_idStr,"UTF-8")+"&&"
                    +URLEncoder.encode("points","UTF-8")+"="+URLEncoder.encode(pointsStr,"UTF-8")+"&&"
                    +URLEncoder.encode("member_number","UTF-8")+"="+URLEncoder.encode(memberNumberStr,"UTF-8");
            writer.write(data);
            writer.flush();
            writer.close();
            ops.close();

            InputStream ips = http.getInputStream();
            BufferedReader reader = new BufferedReader(new InputStreamReader(ips,"ISO-8859-1"));

            String line ="";
            while ((line = reader.readLine()) != null)
            {
                result += line;
            }

            JSONObject obj = new JSONObject(result);
            line = obj.getString("data");

            System.out.println("Result: " + line);
            reader.close();
            ips.close();
            http.disconnect();
            return result;

        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (ProtocolException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        } catch (JSONException e) {
            e.printStackTrace();
        }
        return result;
    }
}


