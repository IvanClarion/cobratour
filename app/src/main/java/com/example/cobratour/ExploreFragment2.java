package com.example.cobratour;

import android.os.Bundle;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

public class ExploreFragment2 extends Fragment {

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        // Inflate the explore_1.xml layout in this fragment
        View view = inflater.inflate(R.layout.explore_2, container, false);

        // Set up button listener for the first_page_button
        Button firstPageButton = view.findViewById(R.id.first_page_button);
        firstPageButton.setOnClickListener(v -> {
            // Replace the fragment with ExploreFragment2 when button is clicked
            replaceFragment(new ExploreFragment(), true);
        });

        // Set up button listener for the more_button
        Button moreButton = view.findViewById(R.id.more_button);
        moreButton.setOnClickListener(v -> {
            // Replace the fragment with MoreFragment when more_button is clicked
            replaceFragment(new MoreFragment(), true);
        });

        // Set up button listener for the map_button
        Button mapButton = view.findViewById(R.id.map_button);
        mapButton.setOnClickListener(v -> {
            // Replace the fragment with MapFragment when map_button is clicked
            replaceFragment(new MapFragment(), true);
        });

        // Set up button listener for the more_button
        Button buildingButton = view.findViewById(R.id.building_button);
        buildingButton.setOnClickListener(v -> {
            // Replace the fragment with MoreFragment when more_button is clicked
            replaceFragment(new ExploreFragment(), true);
        });

        // Set up button listener for the clinic_button
        Button clinicButton = view.findViewById(R.id.clinic_button);
        clinicButton.setOnClickListener(v -> {
            // Replace the fragment with PhFragment when phinma_hall_button is clicked
            replaceFragment(new ClinicFragment(), true);
        });

        // Set up button listener for the ustore_button
        Button ustoreButton = view.findViewById(R.id.ustore_button);
        ustoreButton.setOnClickListener(v -> {
            // Replace the fragment with PhFragment when phinma_hall_button is clicked
            replaceFragment(new UstoreFragment(), true);
        });

        // Set up button listener for the marketing_button
        Button marketingButton = view.findViewById(R.id.marketing_button);
        marketingButton.setOnClickListener(v -> {
            // Replace the fragment with PhFragment when phinma_hall_button is clicked
            replaceFragment(new MarketingFragment(), true);
        });

        // Set up button listener for the foreign_lounge_button
        Button foreign_loungeButton = view.findViewById(R.id.foreign_lounge_button);
        foreign_loungeButton.setOnClickListener(v -> {
            // Replace the fragment with PhFragment when phinma_hall_button is clicked
            replaceFragment(new ForeignLoungeFragment(), true);
        });

        // Set up button listener for the univ_lib_button
        Button univ_libButton = view.findViewById(R.id.univ_lib_button);
        univ_libButton.setOnClickListener(v -> {
            // Replace the fragment with PhFragment when phinma_hall_button is clicked
            replaceFragment(new UnivLibFragment1(), true);
        });

        // Set up button listener for the chapel_button
        Button chapelButton = view.findViewById(R.id.chapel_button);
        chapelButton.setOnClickListener(v -> {
            // Replace the fragment with PhFragment when phinma_hall_button is clicked
            replaceFragment(new ChapelFragment(), true);
        });

        // Set up button listener for the foodcourt_button
        Button foodcourtButton = view.findViewById(R.id.foodcourt_button);
        foodcourtButton.setOnClickListener(v -> {
            // Replace the fragment with PhFragment when phinma_hall_button is clicked
            replaceFragment(new FoodcourtFragment(), true);
        });

        // Set up button listener for the garden_button
        Button gardenButton = view.findViewById(R.id.garden_button);
        gardenButton.setOnClickListener(v -> {
            // Replace the fragment with PhFragment when phinma_hall_button is clicked
            replaceFragment(new GardenFragment(), true);
        });

        return view;
    }

    // Method to replace the fragment
    private void replaceFragment(Fragment fragment, boolean addToBackStack) {
        if (getActivity() != null) {
            MainActivity mainActivity = (MainActivity) getActivity();
            mainActivity.replaceFragment(fragment, addToBackStack);
        }
    }
}
