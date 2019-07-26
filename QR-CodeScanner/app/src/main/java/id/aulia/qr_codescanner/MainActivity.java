package id.aulia.qr_codescanner;

import android.content.DialogInterface;
import android.os.AsyncTask;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.widget.Toast;
import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import com.google.zxing.Result;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import me.dm7.barcodescanner.zxing.ZXingScannerView;


/*
aulia naufal afif
14000018162

App Android digunakan untuk scan QR Code barang, setelah terdeteksi dan kode barang sesuai barang
lalu dapat diklik ok untuk dimasukan ke keranjang belanja web kasir.


 */

public class MainActivity extends AppCompatActivity implements ZXingScannerView.ResultHandler {
    private ZXingScannerView mScannerView;
    String Tempbarcode, userid ;
    String ServerURL = "https://auliana.com/sim-apotek/API-Android/api-test.php" ;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        mScannerView = new ZXingScannerView(this);
        setContentView(mScannerView);
    }


    @Override
    public void onResume() {
        super.onResume();
        mScannerView.setResultHandler(this);
        mScannerView.startCamera();
    }

    @Override
    public void onPause() {
        super.onPause();
        mScannerView.stopCamera();
    }

    @Override
    public void handleResult(Result rawResult) {

        Log.v("TAG", rawResult.getText());
        Log.v("TAG", rawResult.getBarcodeFormat().toString());
        Tempbarcode = rawResult.getText().toString();
        userid = "UID005";
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
                builder.setTitle("Kode Barang");
                builder.setMessage(rawResult.getText())
                        .setPositiveButton("OK", new DialogInterface.OnClickListener() {
                            public void onClick(DialogInterface dialog, int id) {


                                InsertData(Tempbarcode, userid);
                            }
                        });
                AlertDialog alert1 = builder.create();
                alert1.show();


        mScannerView.resumeCameraPreview(this);
    }


    public void GetData(){



    }

    /*
    prosedure  untuk melakukan kirim/insertdata ke database pada table Penjualan_tmp
     */

    public void InsertData(final String barcode, final String userid){

        class SendPostReqAsyncTask extends AsyncTask<String, Void, String> {
            @Override
            protected String doInBackground(String... params) {

                String BarcodeHolder = barcode ;
                String UseriddeHolder = userid ;

                List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();

                nameValuePairs.add(new BasicNameValuePair("barcode", BarcodeHolder));
                nameValuePairs.add(new BasicNameValuePair("userid", UseriddeHolder));

                try {
                    HttpClient httpClient = new DefaultHttpClient();

                    HttpPost httpPost = new HttpPost(ServerURL);

                    httpPost.setEntity(new UrlEncodedFormEntity(nameValuePairs));

                    HttpResponse httpResponse = httpClient.execute(httpPost);

                    HttpEntity httpEntity = httpResponse.getEntity();


                } catch (ClientProtocolException e) {

                } catch (IOException e) {

                }
                return "Data berhasil masuk";
            }

            @Override
            protected void onPostExecute(String result) {

                super.onPostExecute(result);

                Toast.makeText(MainActivity.this, "Data berhasil masuk", Toast.LENGTH_LONG).show();

            }
        }

        SendPostReqAsyncTask sendPostReqAsyncTask = new SendPostReqAsyncTask();

        sendPostReqAsyncTask.execute(barcode,userid);
    }

}
