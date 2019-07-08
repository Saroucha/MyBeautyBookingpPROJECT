package com.example.mybeautybooking.fragment;

import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.location.Address;
import android.location.Geocoder;
import android.location.Location;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.ActivityCompat;
import android.support.v4.app.Fragment;
import android.support.v7.app.AlertDialog;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.SeekBar;
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
import com.example.mybeautybooking.R;
import com.example.mybeautybooking.activity.Formulaire;
import com.example.mybeautybooking.activity.Main_Act_Map_Listpro;
import com.example.mybeautybooking.activity.Main_Act_Map_Listpro_Connect;
import com.example.mybeautybooking.activity.Professionnel;
import com.google.android.gms.location.FusedLocationProviderClient;
import com.google.android.gms.location.LocationServices;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.tasks.OnSuccessListener;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import static android.Manifest.permission.ACCESS_FINE_LOCATION;


/**
 * A simple {@link Fragment} subclass.
 * Activities that contain this fragment must implement the
 * {@link OnFragmentInteractionListener} interface
 * to handle interaction events.
 * Use the {@link HomeFragment#newInstance} factory method to
 * create an instance of this fragment.
 */
public class HomeFragment extends Fragment {

    /////////////////////////////**************/////////////////////////
    private FusedLocationProviderClient client;
    static private Location ma_pos = null ;
    //////////////////////////////////
    private RequestQueue requestQueue;
    private static final String URL = "http://192.168.43.103/ProjetClient2/MyBeautyBookingServer-master/select_vente.php";
    private StringRequest request;
    Professionnel pro;
    Button b1;
    static ArrayList<Professionnel> listPro = null;
    static ArrayList<Professionnel> listPro1 =null;
    static ArrayList<Professionnel> listPro2 =null;
    static int rtn;
    private String s ;
    EditText location_tf;
    TextView text;
    //SeekBar seekBarKm;
    Button chercher;
    static int progress = 10;
    private String location;
    private GoogleMap map;
    // private ParseContent parseContent;

    //private final int LoginTask = 1;

    static private CheckBox cb1;
    static private CheckBox cb2;
    static private CheckBox cb3;
    static private CheckBox cb4;
    //static private CheckBox cb5;
    //static private CheckBox cb6;


    public void map_activity(){

        Intent intent = new Intent(this.getContext(), Main_Act_Map_Listpro_Connect.class);
        startActivity(intent);
    }

    public void getpro(){
        listPro=new ArrayList<>();
        listPro1=new ArrayList<>();
        listPro2=new ArrayList<>();
        requestQueue = Volley.newRequestQueue(getContext().getApplicationContext());

        request = new StringRequest(Request.Method.GET, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    // create json object with php reponse
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
                            pro.setRayon(json.getInt("Distance"));
                            pro.setRegistre(json.getInt("Registre"));
                            pro.setDescription(json.getString("Description"));
                            // promo.setancien_prix(json.getString("ancien_prix"));
                            // promo.setnouveau_prix(json.getString("nouveau_prix"));
                            //promo.setimage(json.getString("image"));
                            // promo.setTexte(json.getString("texte"));

                        } catch (JSONException e) {

                            e.printStackTrace();
                        }
                        listPro.add(pro);
                    }
                    rtn=trie();
                    if (rtn!=0) {
                        Intent intent = new Intent(getContext().getApplicationContext(), Main_Act_Map_Listpro_Connect.class);
                        intent.putExtra("list", listPro2);
                        startActivity(intent);
                    }else{
                        showAlertDialogButtonClicked(getActivity().getCurrentFocus());
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

                if (error instanceof TimeoutError) { Toast.makeText(getContext().getApplicationContext(), "TimeoutError", Toast.LENGTH_LONG).show();}

                if ( error instanceof NoConnectionError) { Toast.makeText(getContext().getApplicationContext(), "NoConnectionError" ,Toast.LENGTH_LONG).show();}

                if (error instanceof AuthFailureError) {
                    Toast.makeText(getContext().getApplicationContext(), "AuthFailureError" ,Toast.LENGTH_LONG).show();}
                else if (error instanceof ServerError) {
                    Toast.makeText(getContext().getApplicationContext(), "ServerError", Toast.LENGTH_LONG).show(); }

                else if (error instanceof NetworkError) {
                    Toast.makeText(getContext().getApplicationContext(), "NetworkError", Toast.LENGTH_LONG).show(); }

                else if  (error instanceof ParseError) {
                    Toast.makeText(getContext().getApplicationContext(), "ParseError" ,Toast.LENGTH_LONG).show();}

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

    public int trie () {
        int rtn =1;
        List<Location> locationList = null;
        List<Address> addressList = null;
        Address address = null;
        Location lUser = null;
        List<String> listCat;

        listCat = list_categorie_cochée();
        boolean exist = false;

        if (!location.equals("") && !location.equals("Ma position actuelle")) {
            Address auser = stringToAdresse(location);
            lUser = adresseToLocation(auser);
        } else {

            lUser = ma_pos;
        }
        Location loc = null;

        String f;

        for (Professionnel p : listPro) {
            for (String s : listCat) {
                if (s.equals(p.getSpecialite().toString())) {
                    listPro1.add(p);
                }
            }
        }

        listPro2.clear();
        for (Professionnel p : listPro1) {
            addressList = null;
            if (p.getVille() != null || !p.getVille().equals("")) {
                Geocoder geocoder = new Geocoder(this.getContext());
                address = stringToAdresse(p.getVille());
                loc = adresseToLocation(address);
                if (lUser.distanceTo(loc) / 1000 < p.getRayon()) {
                    listPro2.add(p);
                }
            }
        }

        if (listPro2.size() == 0 || listPro1.size()==0) {
            //showAlertDialogButtonClicked(getCurrentFocus());
            rtn = 0;
        }
        return rtn;
    }

    public boolean is_Checked_box(){

        if (cb1.isChecked()||cb2.isChecked()||cb3.isChecked()||cb4.isChecked()) {
            return true;
        }else {
            return false;
        }

    }


    public void showAlertDialogButtonClicked(View view) {
        // setup the alert builder
        AlertDialog.Builder builder = new AlertDialog.Builder(this.getContext());
        builder.setTitle("Information");
        builder.setMessage("Aucun resultat ne correspont à votre recherche, modifier vos paramettre");
        // add a button
        builder.setPositiveButton("OK", null);
        // create and show the alert dialog
        AlertDialog dialog = builder.create();
        dialog.show();
    }

    public  List<String> list_categorie_cochée() {

        //cb1 = (CheckBox) findViewById(R.id.checkBox2);
        //cb2 = (CheckBox) findViewById(R.id.checkBox4);
        //cb3= (CheckBox) findViewById(R.id.checkBox5);
        // btnDisplay = (Button) findViewById(R.id.btnDisplay);
        List<String> result = new ArrayList<>();
        if (cb1.isChecked()) {
            result.add((String) cb1.getText());
        }
        if (cb2.isChecked()) {
            result.add((String) cb2.getText());
        }
        if (cb3.isChecked()) {
            result.add((String) cb3.getText());
        }
        if (cb4.isChecked()) {
            result.add((String) cb4.getText());
        }
      //  if (cb5.isChecked()) {
        //    result.add((String) cb5.getText());
      //  }
        //if (cb6.isChecked()) {
          //  result.add((String) cb6.getText());
       // }
        return result;
    }

    void requestPermission() {
        ActivityCompat.requestPermissions(getActivity(), new String[]{ACCESS_FINE_LOCATION}, 1);
    }

    public Address stringToAdresse(String s ){
        Address address = null;

        List<Address> addressList = null;

        Geocoder geocoder = new Geocoder(this.getContext());
        try {
            addressList = geocoder.getFromLocationName(s, 1);
            address=addressList.get(0);

        } catch (IOException e) {
            e.printStackTrace();
        }
        return address;
    }

    public Location adresseToLocation(Address address){
        Location locationA = new Location("");
        locationA.setLatitude(address.getLatitude());
        locationA.setLongitude(address.getLongitude());
        return locationA;
    }
    /////////////////////////////**************/////////////////////////







    // TODO: Rename parameter arguments, choose names that match
    // the fragment initialization parameters, e.g. ARG_ITEM_NUMBER
    private static final String ARG_PARAM1 = "param1";
    private static final String ARG_PARAM2 = "param2";

    // TODO: Rename and change types of parameters
    private String mParam1;
    private String mParam2;

    private OnFragmentInteractionListener mListener;

    public HomeFragment() {
        // Required empty public constructor
    }

    /**
     * Use this factory method to create a new instance of
     * this fragment using the provided parameters.
     *
     * @param param1 Parameter 1.
     * @param param2 Parameter 2.
     * @return A new instance of fragment HomeFragment.
     */
    // TODO: Rename and change types and number of parameters
    public static HomeFragment newInstance(String param1, String param2) {
        HomeFragment fragment = new HomeFragment();
        Bundle args = new Bundle();
        args.putString(ARG_PARAM1, param1);
        args.putString(ARG_PARAM2, param2);
        fragment.setArguments(args);
        return fragment;
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if (getArguments() != null) {
            mParam1 = getArguments().getString(ARG_PARAM1);
            mParam2 = getArguments().getString(ARG_PARAM2);
        }
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment

        View view = inflater.inflate(R.layout.fragment_home, container, false);

        cb1 = (CheckBox) view.findViewById(R.id.checkBox1);
        cb2 = (CheckBox) view.findViewById(R.id.checkBox2);
        cb3= (CheckBox) view.findViewById(R.id.checkBox3);
        cb4 = (CheckBox) view.findViewById(R.id.checkBox4);
        //cb5 = (CheckBox) view.findViewById(R.id.checkBox5);
       // cb6= (CheckBox) view.findViewById(R.id.checkBox6);
        //Button button = (Button)view.findViewById(R.id.button2);
        chercher = (Button) view.findViewById(R.id.Chercher);
        b1= (Button)view.findViewById(R.id.button4);

        requestPermission();

        client = LocationServices.getFusedLocationProviderClient(this.getContext());
        b1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(v.getContext(),"Veuillez choisir une categorie", Toast.LENGTH_SHORT).show();
                if (ActivityCompat.checkSelfPermission(v.getContext(), ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
                    return;
                }
                client.getLastLocation().addOnSuccessListener(getActivity(), new OnSuccessListener<Location>() {
                    @Override
                    public void onSuccess(Location location) {
                        if (location != null) {
                            location_tf.setText("Ma position actuelle");
                            ma_pos=location;
                        }
                    }
                });
            }
        });
        location_tf = (EditText) view.findViewById(R.id.ET_Adresse);

        //seekBarKm = (SeekBar) view.findViewById(R.id.SeekBarKm);
        //seekBarKm.setMax(40);
        //seekBarKm.setProgress(progress);
        //text = text = (TextView) view.findViewById(R.id.Peremetre);
        //text.setText("" + progress + " Km");
        //seekBarKm.setOnSeekBarChangeListener(new SeekBar.OnSeekBarChangeListener() {
          //  @Override
           // public void onProgressChanged(SeekBar seekBar, int i, boolean b) {
             //   progress = i;
               // text.setText(progress+ " Km");
           // }
           // @Override
           // public void onStartTrackingTouch(SeekBar seekBar) {
           // }
           // @Override
           // public void onStopTrackingTouch(SeekBar seekBar) {

           // }
       // });


        chercher.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (location_tf.getText().toString().equals("") &&!is_Checked_box()) {
                    Toast.makeText(v.getContext(), "Veuillez choisir une adresse et une categorie", Toast.LENGTH_SHORT).show();
                }
                else if (location_tf.getText().toString().equals("") ) {
                    Toast.makeText(v.getContext(), "Veuillez choisir une adresse", Toast.LENGTH_SHORT).show();
                } else if (!is_Checked_box()) {
                    Toast.makeText(v.getContext(),"Veuillez choisir une categorie", Toast.LENGTH_SHORT).show();
                }else{

                    location = location_tf.getText().toString();
                    getpro();
                }
            }
        });

        return view;

    }

    // TODO: Rename method, update argument and hook method into UI event
    public void onButtonPressed(Uri uri) {
        if (mListener != null) {
            mListener.onFragmentInteraction(uri);
        }
    }

    @Override
    public void onAttach(Context context) {
        super.onAttach(context);
        if (context instanceof OnFragmentInteractionListener) {
            mListener = (OnFragmentInteractionListener) context;
        } else {
            throw new RuntimeException(context.toString()
                    + " must implement OnFragmentInteractionListener");
        }
    }

    @Override
    public void onDetach() {
        super.onDetach();
        mListener = null;
    }

    /**
     * This interface must be implemented by activities that contain this
     * fragment to allow an interaction in this fragment to be communicated
     * to the activity and potentially other fragments contained in that
     * activity.
     * <p>
     * See the Android Training lesson <a href=
     * "http://developer.android.com/training/basics/fragments/communicating.html"
     * >Communicating with Other Fragments</a> for more information.
     */
    public interface OnFragmentInteractionListener {
        // TODO: Update argument type and name
        void onFragmentInteraction(Uri uri);
    }

}



