#!/bin/bash

echo "🔍 Validating /src/ structure..."

# --- Config ---
VALID_LAYOUTS=("Explainer" "Gallery")
VALID_GROUPS=("CaseStudies" "ConceptualProjects" "Artifacts" "Systems")

# --- Helpers ---
function kebab_case() {
  echo "$1" | grep -qE '^[a-z0-9]+(-[a-z0-9]+)*$'
}

function pascal_case() {
  echo "$1" | grep -qE '^[A-Z][a-zA-Z0-9]+$'
}

# --- Validate Project + Journal Structure ---
find src/Projects src/Journal -mindepth 1 -maxdepth 1 -type d | while read dir; do
  name=$(basename "$dir")

  # Casing check
  if [[ "$dir" == src/Projects/* ]] && ! pascal_case "$name"; then
    echo "❌ $name in /Projects is not PascalCase"
  fi

  if [[ "$dir" == src/Journal/* ]] && ! [[ "$name" =~ ^[0-9]{4}-[0-9]{2}-[0-9]{2}-.+ ]]; then
    echo "❌ $name in /Journal must start with a date (YYYY-MM-DD)"
  fi

  yaml="$dir/Config.yaml"
  if [[ ! -f "$yaml" ]]; then
    echo "❌ Missing Config.yaml in $dir"
    continue
  fi

  # Extract YAML fields
  title=$(grep '^title:' "$yaml" | cut -d':' -f2- | xargs)
  slug=$(grep '^slug:' "$yaml" | cut -d':' -f2- | xargs)
  layout=$(grep '^layout:' "$yaml" | cut -d':' -f2- | xargs)
  group=$(grep '^group:' "$yaml" | cut -d':' -f2- | xargs)

  # Field presence
  [[ -z "$title" ]] && echo "❌ $dir missing 'title'"  
  [[ -z "$slug" ]] && echo "❌ $dir missing 'slug'"  
  [[ -z "$layout" ]] && echo "❌ $dir missing 'layout'"  
  [[ -z "$group" ]] && echo "❌ $dir missing 'group'"  

  # Slug format
  if [[ -n "$slug" ]] && ! kebab_case "$slug"; then
    echo "❌ Slug \"$slug\" in $dir is not kebab-case"
  fi

  # Layout + group enum check
  if [[ -n "$layout" ]] && [[ ! " ${VALID_LAYOUTS[*]} " =~ " $layout " ]]; then
    echo "❌ Invalid layout \"$layout\" in $dir"
  fi
  if [[ -n "$group" ]] && [[ ! " ${VALID_GROUPS[*]} " =~ " $group " ]]; then
    echo "❌ Invalid group \"$group\" in $dir"
  fi
done

echo "✅ Validation complete."
