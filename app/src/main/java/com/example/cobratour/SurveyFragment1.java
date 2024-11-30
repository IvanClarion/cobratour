package com.example.cobratour;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.Button;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

public class SurveyFragment1 extends Fragment {

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        // Inflate the survey_1.xml layout
        View view = inflater.inflate(R.layout.survey_1, container, false);

        // Initialize buttons
        Button studentButton = view.findViewById(R.id.student_button);
        Button employeeButton = view.findViewById(R.id.employee_button);
        Button visitorButton = view.findViewById(R.id.visitor_button);

        // Load bounce animation
        Animation bounceAnimation = AnimationUtils.loadAnimation(getActivity(), R.anim.bounce);

        // Set click listener for buttons
        View.OnClickListener buttonClickListener = v -> {
            v.startAnimation(bounceAnimation);
            v.postDelayed(() -> {
                // Replace with SurveyFragment2 and apply the slide animation
                replaceFragment(new SurveyFragment2(), true);
            }, 300); // Delay to match the animation duration
        };

        // Assign click listeners to each button
        studentButton.setOnClickListener(buttonClickListener);
        employeeButton.setOnClickListener(buttonClickListener);
        visitorButton.setOnClickListener(buttonClickListener);

        return view;
    }

    private void replaceFragment(Fragment fragment, boolean addToBackStack) {
        if (getActivity() != null) {
            MainActivity mainActivity = (MainActivity) getActivity();
            // Clear back stack if transitioning to SurveyFragment2
            if (fragment instanceof SurveyFragment2) {
                mainActivity.clearBackStack();
            }
            // Use MainActivity's replaceFragment method
            mainActivity.replaceFragment(fragment, addToBackStack);
        }
    }
}
