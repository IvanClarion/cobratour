package com.example.cobratour;

import android.os.Bundle;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

public class PhFragment6 extends Fragment {

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        // Inflate the ph_1.xml layout
        View view = inflater.inflate(R.layout.ph_6, container, false);

        // Setup button listeners for navigation
        Button sixthPageButton = view.findViewById(R.id.first_page_button);
        sixthPageButton.setOnClickListener(v -> replaceFragment(new PhFragment1()));

        Button secondPageButton = view.findViewById(R.id.second_page_button);
        secondPageButton.setOnClickListener(v -> replaceFragment(new PhFragment2()));

        Button thirdPageButton = view.findViewById(R.id.third_page_button);
        thirdPageButton.setOnClickListener(v -> replaceFragment(new PhFragment3()));

        Button fourthPageButton = view.findViewById(R.id.fourth_page_button);
        fourthPageButton.setOnClickListener(v -> replaceFragment(new PhFragment4()));

        Button fifthPageButton = view.findViewById(R.id.fifth_page_button);
        fifthPageButton.setOnClickListener(v -> replaceFragment(new PhFragment5()));

        Button seventhPageButton = view.findViewById(R.id.seventh_page_button);
        seventhPageButton.setOnClickListener(v -> replaceFragment(new PhFragment7()));

        Button backButton = view.findViewById(R.id.back_button);
        backButton.setOnClickListener(v -> replaceFragment(new ExploreFragment()));

        return view;
    }

    // Helper method to replace fragment
    private void replaceFragment(Fragment fragment) {
        if (getActivity() != null) {
            MainActivity mainActivity = (MainActivity) getActivity();
            mainActivity.replaceFragment(fragment, true); // true to add to backstack
        }
    }
}
