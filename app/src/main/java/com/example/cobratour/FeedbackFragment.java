package com.example.cobratour;

import android.os.Bundle;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

public class FeedbackFragment extends Fragment {

    // Track the currently selected button
    private Button currentSelectedButton = null;
    private Button currentSelectedClickedButton = null;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.feedback, container, false);

        // Set up all the buttons and their corresponding clicked versions
        Button verybadButton = view.findViewById(R.id.verybad_button);
        Button verybadClicked = view.findViewById(R.id.verybad_clicked);
        Button badButton = view.findViewById(R.id.bad_button);
        Button badClicked = view.findViewById(R.id.bad_clicked);
        Button neutralButton = view.findViewById(R.id.neutral_button);
        Button neutralClicked = view.findViewById(R.id.neutral_clicked);
        Button goodButton = view.findViewById(R.id.good_button);
        Button goodClicked = view.findViewById(R.id.good_clicked);
        Button verygoodButton = view.findViewById(R.id.verygood_button);
        Button verygoodClicked = view.findViewById(R.id.verygood_clicked);

        // Set click listeners for all the buttons
        setupButtonClickListener(verybadButton, verybadClicked);
        setupButtonClickListener(badButton, badClicked);
        setupButtonClickListener(neutralButton, neutralClicked);
        setupButtonClickListener(goodButton, goodClicked);
        setupButtonClickListener(verygoodButton, verygoodClicked);

        // Set up the back button
        Button backButton = view.findViewById(R.id.back_button);
        backButton.setOnClickListener(v -> replaceFragment(new MoreFragment()));

        // Set up the submit button
        Button submitButton = view.findViewById(R.id.submit_button); // Use the correct ID
        submitButton.setOnClickListener(v -> replaceFragment(new LoadingFragment()));

        return view;
    }

    // Method to set up click listeners for each pair of buttons
    private void setupButtonClickListener(Button button, Button clickedButton) {
        button.setOnClickListener(v -> {
            // Reset the previously selected button if there is one
            if (currentSelectedButton != null && currentSelectedClickedButton != null) {
                currentSelectedButton.setVisibility(View.VISIBLE);
                currentSelectedClickedButton.setVisibility(View.INVISIBLE);  // Use INVISIBLE instead of GONE
            }

            // Hide the current button and show its clicked version
            button.setVisibility(View.INVISIBLE);  // Use INVISIBLE instead of GONE
            clickedButton.setVisibility(View.VISIBLE);

            // Update the currently selected button and clicked button
            currentSelectedButton = button;
            currentSelectedClickedButton = clickedButton;
        });
    }

    // Helper method to replace fragment
    private void replaceFragment(Fragment fragment) {
        if (getActivity() != null) {
            MainActivity mainActivity = (MainActivity) getActivity();
            mainActivity.replaceFragment(fragment, true); // true to add to backstack
        }
    }
}
