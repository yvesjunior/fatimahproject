#!/bin/bash
set -e

# =============================================================
# Fatimah Project Mission — Production Deployment Script
# Run this on your Linux production server.
#
# Production uses an EXTERNAL PostgreSQL database (managed instance
# or Postgres running on the host VM) — there is no database container.
# =============================================================

echo "========================================="
echo " Fatimah Project Mission - Deploy"
echo "========================================="

# --- Config defaults ---
DB_HOST="host.docker.internal"   # use this when Postgres runs on the host VM
DB_PORT="5432"
DB_NAME="fatimaproject"
DB_USER="fatimaproject"
DB_PASS="changeme"
DB_SSLMODE="prefer"
APP_PORT="80"
APP_URL="http://localhost"
SESSION_DOMAIN=""
APP_SOURCE_PATH="$(cd "$(dirname "$0")" && pwd)"
APP_KEY=""

# --- Parse arguments ---
while [[ $# -gt 0 ]]; do
    case $1 in
        --db-host) DB_HOST="$2"; shift 2;;
        --db-port) DB_PORT="$2"; shift 2;;
        --db-name) DB_NAME="$2"; shift 2;;
        --db-user) DB_USER="$2"; shift 2;;
        --db-pass) DB_PASS="$2"; shift 2;;
        --db-sslmode) DB_SSLMODE="$2"; shift 2;;
        --app-key) APP_KEY="$2"; shift 2;;
        --app-url) APP_URL="$2"; shift 2;;
        --session-domain) SESSION_DOMAIN="$2"; shift 2;;
        --source-path) APP_SOURCE_PATH="$2"; shift 2;;
        --port) APP_PORT="$2"; shift 2;;
        --load-image) LOAD_IMAGE=true; shift;;
        --help)
            echo "Usage: ./deploy.sh [OPTIONS]"
            echo ""
            echo "Options:"
            echo "  --db-host HOST           PostgreSQL host (default: host.docker.internal)"
            echo "  --db-port PORT           PostgreSQL port (default: 5432)"
            echo "  --db-name NAME           Database name (default: fatimaproject)"
            echo "  --db-user USER           Database user (default: fatimaproject)"
            echo "  --db-pass PASSWORD       Database password (default: changeme)"
            echo "  --db-sslmode MODE        PostgreSQL sslmode (default: prefer)"
            echo "  --app-key KEY            Laravel APP_KEY (required)"
            echo "  --app-url URL            Public URL (default: http://localhost)"
            echo "  --session-domain DOMAIN  Cookie domain (default: empty)"
            echo "  --source-path PATH       Repo path mounted into the container (default: script dir)"
            echo "  --port PORT              Web port (default: 80)"
            echo "  --load-image             Load Docker image from fatimaproject-prod.tar.gz"
            echo ""
            echo "Examples:"
            echo "  First deploy:  ./deploy.sh --app-key base64:... --app-url https://example.com \\"
            echo "                   --db-host 10.0.0.5 --db-pass secret123 --session-domain example.com --load-image"
            echo "  Restart:       ./deploy.sh --app-key base64:... --app-url https://example.com --db-pass secret123"
            exit 0;;
        *) echo "Unknown option: $1"; exit 1;;
    esac
done

if [ -z "$APP_KEY" ]; then
    echo "ERROR: --app-key is required (generate with: php artisan key:generate --show)"
    exit 1
fi

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
cd "$SCRIPT_DIR"

# --- Step 1: Load Docker image ---
if [ "$LOAD_IMAGE" = true ]; then
    echo ""
    echo "[1/3] Loading Docker image..."
    if [ ! -f fatimaproject-prod.tar.gz ]; then
        echo "ERROR: fatimaproject-prod.tar.gz not found in $SCRIPT_DIR"
        exit 1
    fi
    docker load < fatimaproject-prod.tar.gz
    echo "  Done."
else
    echo ""
    echo "[1/3] Skipping image load (use --load-image to load)"
fi

# --- Step 2: Create .env file ---
echo ""
echo "[2/3] Writing .env..."
cat > .env <<ENVFILE
WEB_PORT=${APP_PORT}
APP_KEY=${APP_KEY}
APP_URL=${APP_URL}
SESSION_DOMAIN=${SESSION_DOMAIN}
APP_SOURCE_PATH=${APP_SOURCE_PATH}

DB_HOST=${DB_HOST}
DB_PORT=${DB_PORT}
DB_DATABASE=${DB_NAME}
DB_USERNAME=${DB_USER}
DB_PASSWORD=${DB_PASS}
DB_SSLMODE=${DB_SSLMODE}
ENVFILE
echo "  Done."

# --- Step 3: Start container ---
echo ""
echo "[3/3] Starting container..."
echo "  Using external PostgreSQL at ${DB_HOST}:${DB_PORT} (db '${DB_NAME}')."
echo "  Schema is created/updated automatically via 'php artisan migrate --force' on start."

docker compose -f docker-compose.yml down 2>/dev/null || true
docker compose -f docker-compose.yml up -d

echo ""
echo "  Waiting for services to be ready..."
sleep 10

echo ""
echo "========================================="
echo " Deployment complete!"
echo ""
echo " Site:  ${APP_URL}"
echo " Admin: ${APP_URL}/admin"
echo " Login: admin@fatimaproject.org / password"
echo "========================================="
echo ""
echo "IMPORTANT: Change the admin password after first login!"
echo ""
echo "To check logs:  docker logs fatimaproject_prod"
echo "To stop:        docker compose -f docker-compose.yml down"
