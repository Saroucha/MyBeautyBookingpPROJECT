package com.example.mybeautybooking.activity;

import android.content.Context;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.NetworkError;
import com.android.volley.NoConnectionError;
import com.android.volley.ParseError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.ServerError;
import com.android.volley.TimeoutError;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.mybeautybooking.ClientLoginActivity_recherche;
import com.example.mybeautybooking.ClientSignupActivity_recherche;
import com.example.mybeautybooking.HomePage;
import com.example.mybeautybooking.R;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import static android.content.Intent.FLAG_ACTIVITY_NEW_TASK;

public class ListAdapter extends RecyclerView.Adapter {

    List<Professionnel> Ap=new ArrayList<>();
    private RequestQueue requestQueue;
    private static final String URL = "http://10.192.133.155/beautybooking/select_vente.php";
    private StringRequest request;
    Professionnel pro;
    static ArrayList<Professionnel> listPro = null;
    static ArrayList<Professionnel> listPro1 =null;

    public ListAdapter(ArrayList<Professionnel> Ap)
    {this.Ap=Ap;
    }

    @NonNull
    @Override
    public RecyclerView.ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.list_items,parent,false);
        return new ListAdapter.ListViewHolder(view);
    }
    @Override
    public void onBindViewHolder(@NonNull RecyclerView.ViewHolder holder, int position) {
        ((ListAdapter.ListViewHolder) holder).bindView(position);
    }
    @Override
    public int getItemCount() {
        return  Ap.size();
        //return Our_Data.title.length;
    }
    private class ListViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener{

        private TextView mItemsText;
        private TextView mItemsText2;
        private ImageView mImageView;

        public ListViewHolder (View itemView){
            super(itemView);
            mItemsText = (TextView) itemView.findViewById(R.id.itemText);
            mItemsText2 = (TextView) itemView.findViewById(R.id.itemText2);
            mImageView = (ImageView) itemView.findViewById(R.id.itemImage);

            itemView.setOnClickListener(this);
        }

        public void bindView(int position){
            mItemsText.setText(Ap.get(position).getNomEntreprise());
            mItemsText2.setText(Ap.get(position).getSpecialite());

            if (Ap.get(position).getSpecialite().equals("Onglerie")){
                mImageView.setImageResource(Our_Data.picture_path[0]);
            }else if (Ap.get(position).getSpecialite().equals("Massage")){
                mImageView.setImageResource(Our_Data.picture_path[1]);
            }else if (Ap.get(position).getSpecialite().equals("Coiffure")){
                mImageView.setImageResource(Our_Data.picture_path[2]);
            }else if (Ap.get(position).getSpecialite().equals("Maquillage")){
                mImageView.setImageResource(Our_Data.picture_path[3]);
            }
        }
        public void onClick(View view){
            //listPro=new ArrayList<>();
            //String a = "";
            //a =Ap.get(getAdapterPosition()).getNom();
            //listPro.add((Professionnel) Ap.get(getAdapterPosition()));
            //Intent intent = new Intent(view.getContext().getApplicationContext(),Detail_Pro.class);
            //intent.putExtra("P_Clicked" , listPro);
            //intent.addFlags(FLAG_ACTIVITY_NEW_TASK);
            //view.getContext().getApplicationContext().startActivity(intent);

            //Intent intent = new Intent(view.getContext().getApplicationContext(), ClientSignupActivity_recherche.class);
            //intent.addFlags(Intent.FLAG_ACTIVITY_NO_ANIMATION);
           // startActivityForResult(intent, REQUEST_SIGNUP);
            //view.getContext().getApplicationContext().startActivity(intent);

            Intent intent = new Intent(view.getContext().getApplicationContext(), ClientLoginActivity_recherche.class);
            intent.addFlags(FLAG_ACTIVITY_NEW_TASK);
            view.getContext().getApplicationContext().startActivity(intent);
        }
    }
    public void getpro(final Context context){
        listPro=new ArrayList<>();
        listPro1=new ArrayList<>();
        requestQueue = Volley.newRequestQueue(context);
        request = new StringRequest(Request.Method.GET, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    // create json object with php reponse
                    //JSONObject jsonObject = new JSONObject(response);
                    JSONArray jsonArray = new JSONArray(response);
                    for ( int i = 0; i < jsonArray.length(); i++) {
                        JSONObject json = null;
                        Professionnel pro = new Professionnel();
                        try {
                            json = jsonArray.getJSONObject(i);
                            pro.setNom(json.getString("NomP"));
                            pro.setVille(json.getString("Adresse"));
                            pro.setSpecialite(json.getString("Categorie"));
                            pro.setNum_tel(json.getString("Telephone"));
                            pro.setNomEntreprise(json.getString("NomEntreprise"));
                            // promo.setnouveau_prix(json.getString("nouveau_prix"));
                            //promo.setimage(json.getString("image"));
                            // promo.setTexte(json.getString("texte"));
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                        listPro.add(pro);
                    }
                    Intent intent = new Intent(context.getApplicationContext(),Detail_Pro.class);
                    intent.putExtra("list" , (Serializable) Ap);
                    context.getApplicationContext().startActivity(intent);
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

                if (error instanceof TimeoutError) { Toast.makeText(context, "TimeoutError", Toast.LENGTH_LONG).show();}

                if ( error instanceof NoConnectionError) { Toast.makeText(context.getApplicationContext(), "NoConnectionError" ,Toast.LENGTH_LONG).show();}

                if (error instanceof AuthFailureError) {
                    Toast.makeText(context.getApplicationContext(), "AuthFailureError" ,Toast.LENGTH_LONG).show();}
                else if (error instanceof ServerError) {
                    Toast.makeText(context.getApplicationContext(), "ServerError", Toast.LENGTH_LONG).show(); }

                else if (error instanceof NetworkError) {
                    Toast.makeText(context.getApplicationContext(), "NetworkError", Toast.LENGTH_LONG).show(); }

                else if  (error instanceof ParseError) {
                    Toast.makeText(context.getApplicationContext(), "ParseError" ,Toast.LENGTH_LONG).show();}

            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                HashMap<String,String> hashMap = new HashMap<String, String>();

                return hashMap;
            }
        };

        requestQueue.add(request);

    }
}
