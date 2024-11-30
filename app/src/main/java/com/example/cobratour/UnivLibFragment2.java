package com.example.cobratour;

import android.os.Bundle;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

public class UnivLibFragment2 extends Fragment {

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        // Inflate the explore_1.xml layout in this fragment
        View view = inflater.inflate(R.layout.univ_lib_2, container, false);
        // Set up the back button to navigate to ExploreFragment

        Button firstPageButton = view.findViewById(R.id.first_page_button);
        firstPageButton.setOnClickListener(v -> replaceFragment(new UnivLibFragment1()));

        Button backButton = view.findViewById(R.id.back_button);
        backButton.setOnClickListener(v -> replaceFragment(new ExploreFragment2())); // Navigate back to ExploreFragment

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