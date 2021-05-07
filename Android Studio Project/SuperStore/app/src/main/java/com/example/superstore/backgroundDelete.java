package com.example.superstore;

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

public class backgroundDelete extends AsyncTask <String, Void, String> {
    AlertDialog dialog;
    Context context;
    public Boolean login = false;

    public backgroundDelete(Context context)
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
        if(result.contains("login successful"))
        {
            Intent intent_name = new Intent();
            intent_name.setClass(context.getApplicationContext(), activity_customer.class);
            context.startActivity(intent_name);
        }
    }
    @Override
    protected String doInBackground(String... voids) {
        String result = "";

        try {
            String ID = voids[0];
            String httpIP = voids[1];
            String flag = voids[2];

            URL url = new URL(httpIP);
            HttpURLConnection http = (HttpURLConnection) url.openConnection();
            http.setRequestMethod("POST");
            http.setDoInput(true);
            http.setDoOutput(true);
            OutputStream ops = http.getOutputStream();

            BufferedWriter writer = new BufferedWriter(new OutputStreamWriter(ops,"UTF-8"));
            String data = "";
            if(flag.equals("true")){
                data = URLEncoder.encode("user_id","UTF-8")+"="+URLEncoder.encode(ID,"UTF-8");
            }else{
                data = URLEncoder.encode("ID","UTF-8")+"="+URLEncoder.encode(ID,"UTF-8");
            }
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
                Log.d("myTag6", line);

            }

            JSONObject obj = new JSONObject(result);
            line = obj.getString("data");

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
