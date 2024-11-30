package com.example.cobratour;

import android.os.Bundle;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

public class TechHubFragment2 extends Fragment {

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        // Inflate the tech_hub2.xml layout
        View view = inflater.inflate(R.layout.tech_hub2, container, false);

        // Set up button listener for the first_page_button
        Button firstPageButton = view.findViewById(R.id.first_page_button);
        firstPageButton.setOnClickListener(v -> {
            replaceFragment(new TechHubFragment(), true);
        });

        // Set up button listener for the third_page_button
        Button thirdPageButton = view.findViewById(R.id.third_page_button);
        thirdPageButton.setOnClickListener(v -> {
            replaceFragment(new TechHubFragment3(), true);
        });

        // Set up button listener for the back_button
        Button backButton = view.findViewById(R.id.back_button);
        backButton.setOnClickListener(v -> {
            replaceFragment(new ExploreFragment(), true); // Navigate back to ExploreFragment
        });

        return view;
    }

    private void replaceFragment(Fragment fragment, boolean addToBackStack) {
        if (getActivity() != null) {
            MainActivity mainActivity = (MainActivity) getActivity();
            mainActivity.replaceFragment(fragment, addToBackStack);
        }
    }
}
