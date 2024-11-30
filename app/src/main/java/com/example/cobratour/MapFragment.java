package com.example.cobratour;

import android.os.Bundle;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

public class MapFragment extends Fragment {

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        // Inflate the map.xml layout in this fragment
        View view = inflater.inflate(R.layout.map, container, false);

        // Set up button listener for the building_button
        Button buildingButton = view.findViewById(R.id.building_button);
        buildingButton.setOnClickListener(v -> {
            // Navigate to ExploreFragment when building_button is clicked
            navigateToExploreFragment();
        });

        // Set up button listener for the more_button
        Button moreButton = view.findViewById(R.id.more_button);
        moreButton.setOnClickListener(v -> {
            // Navigate to MoreFragment when more_button is clicked
            navigateToMoreFragment();
        });

        return view;
    }

    // Method to navigate to ExploreFragment
    private void navigateToExploreFragment() {
        MainActivity activity = (MainActivity) getActivity();
        if (activity != null) {
            activity.replaceFragment(new ExploreFragment(), true); // Pass true to add to back stack if needed
        }
    }

    // Method to navigate to MoreFragment
    private void navigateToMoreFragment() {
        MainActivity activity = (MainActivity) getActivity();
        if (activity != null) {
            activity.replaceFragment(new MoreFragment(), true); // Pass true to add to back stack if needed
        }
    }
}
